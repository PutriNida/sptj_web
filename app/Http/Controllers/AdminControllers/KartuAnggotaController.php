<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class KartuAnggotaController extends Controller
{
    public function index()
    {
        $members = DB::table('anggota')
            ->join('master_divisi', 'master_divisi.kd_divisi', '=', 'anggota.kd_divisi')
            ->select('anggota.no_karyawan', 'anggota.nama_lengkap', 'master_divisi.divisi as divisi')
            ->orderBy('anggota.no_karyawan', 'asc')
            ->get();

        return view('admin_pages.member.kartu_anggota_list', compact('members'));
    }

    public function detail($no_karyawan)
    {
        $member = DB::table('anggota')
            ->join('master_divisi', 'master_divisi.kd_divisi', '=', 'anggota.kd_divisi')
            ->join('master_lokasi_kerja', 'master_lokasi_kerja.kd_lokasi_kerja', '=', 'anggota.kd_lokasi_kerja')
            ->join('master_status_karyawan', 'master_status_karyawan.kd_status_karyawan', '=', 'anggota.kd_status_karyawan')
            ->join('master_jabatan', 'master_jabatan.kd_jabatan', '=', 'anggota.kd_jabatan')
            ->select(
                'anggota.no_karyawan',
                'anggota.nama_lengkap',
                'master_divisi.divisi as memberdivisi',
                'master_lokasi_kerja.lokasi_kerja as memberlokasikerja',
                'master_status_karyawan.status_karyawan as memberstatus',
                'master_jabatan.jabatan as memberjabatan'
            )
            ->where('anggota.no_karyawan', $no_karyawan)
            ->first();

        if (!$member) {
            abort(404);
        }

        $barcode_html = $this->renderBarcodeNoKaryawan($member->no_karyawan);

        return view('admin_pages.member.kartu_anggota', [
            'member' => $member,
            'no_karyawan' => $member->no_karyawan,
            'nama_lengkap' => $member->nama_lengkap,
            'memberdivisi' => $member->memberdivisi,
            'memberlokasikerja' => $member->memberlokasikerja,
            'memberstatus' => $member->memberstatus,
            'barcode_html' => $barcode_html,
        ]);
    }

    public function print($no_karyawan)
    {
        $member = DB::table('anggota')
            ->join('master_divisi', 'master_divisi.kd_divisi', '=', 'anggota.kd_divisi')
            ->join('master_lokasi_kerja', 'master_lokasi_kerja.kd_lokasi_kerja', '=', 'anggota.kd_lokasi_kerja')
            ->join('master_status_karyawan', 'master_status_karyawan.kd_status_karyawan', '=', 'anggota.kd_status_karyawan')
            ->join('master_jabatan', 'master_jabatan.kd_jabatan', '=', 'anggota.kd_jabatan')
            ->select(
                'anggota.no_karyawan',
                'anggota.nama_lengkap',
                'master_divisi.divisi as memberdivisi',
                'master_lokasi_kerja.lokasi_kerja as memberlokasikerja',
                'master_status_karyawan.status_karyawan as memberstatus',
                'master_jabatan.jabatan as memberjabatan'
            )
            ->where('anggota.no_karyawan', $no_karyawan)
            ->first();

        if (!$member) {
            abort(404);
        }

        // Pakai PNG base64 untuk memastikan barcode selalu muncul di dompdf
        $barcode_html = $this->renderBarcodeNoKaryawanPng($member->no_karyawan);

        // CR80 / Kartu (85.6mm x 54mm). Dompdf butuh ukuran dalam "point" (1 inch=72pt).
        // Konversi: mm -> pt (pt = mm * 72 / 25.4)
        $cardWidthPt = 85.6 * 72 / 25.4;
        $cardHeightPt = 54 * 72 / 25.4;

        $pdf = app('dompdf.wrapper')
            ->loadView('admin_pages.member.kartu_anggota_print', [
                'member' => $member,
                'no_karyawan' => $member->no_karyawan,
                'nama_lengkap' => $member->nama_lengkap,
                'memberdivisi' => $member->memberdivisi,
                'memberlokasikerja' => $member->memberlokasikerja,
                'memberstatus' => $member->memberstatus,
                'barcode_html' => $barcode_html,
            ])
            ->setPaper([0, 0, $cardWidthPt, $cardHeightPt], 'portrait');

        // Paksa dompdf lebih konsisten: parser HTML5 & hindari page-break
        $pdf = $pdf
            ->set_option('isHtml5ParserEnabled', true)
            ->set_option('isPhpEnabled', true)
            ->set_option('page-break-mode', 'avoid')
            ->set_option('page-break', 'avoid');

        return $pdf->stream('Kartu_Anggota_' . $member->no_karyawan . '.pdf');
    }

    private function renderBarcodeNoKaryawan($no_karyawan)
    {
        $value = (string) $no_karyawan;

        $hash = hash('sha256', $value);
        $bits = '';
        for ($i = 0; $i < strlen($hash); $i++) {
            $bits .= str_pad(base_convert($hash[$i], 16, 2), 4, '0', STR_PAD_LEFT);
        }

        $modules = str_split($bits);
        $bars = [];
        $w = 2; // width per module px (browser/print will scale)

        foreach ($modules as $m) {
            $bars[] = ($m === '1') ? 1 : 0;
        }

        $svg_width = count($bars) * $w;
        $svg_height = 120;

        $x = 0;
        $rects = '';
        foreach ($bars as $b) {
            if ($b === 1) {
                $rects .= '<rect x="' . $x . '" y="0" width="' . $w . '" height="' . $svg_height . '" fill="#0f172a" />';
            }
            $x += $w;
        }

        $safeValue = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

        return '<div style="display:flex; flex-direction:column; align-items:center; gap:6px;">'
            . '<svg xmlns="http://www.w3.org/2000/svg" width="' . $svg_width . '" height="140" viewBox="0 0 ' . $svg_width . ' 140">'
            . '<rect width="100%" height="100%" fill="white" />'
            . $rects
            . '</svg>'
            . '<div style="font-size:12px; font-weight:700; color:#111827;">' . $safeValue . '</div>'
            . '</div>';
    }

    private function renderBarcodeNoKaryawanPng($no_karyawan)
    {
        $value = (string) $no_karyawan;

        $hash = hash('sha256', $value);
        $bits = '';
        for ($i = 0; $i < strlen($hash); $i++) {
            $bits .= str_pad(base_convert($hash[$i], 16, 2), 4, '0', STR_PAD_LEFT);
        }

        $modules = str_split($bits);
        $bars = [];
        $w = 2; // width per module px

        foreach ($modules as $m) {
            $bars[] = ($m === '1') ? 1 : 0;
        }

        $barcodeHeight = 110;
        $labelHeight = 28;
        $paddingY = 6;

        $imgWidth = max(1, count($bars) * $w);
        $imgHeight = $barcodeHeight + $labelHeight + ($paddingY * 2);

        if (!function_exists('imagecreatetruecolor')) {
            // fallback kalau GD tidak tersedia: pakai SVG seperti biasa
            return $this->renderBarcodeNoKaryawan($no_karyawan);
        }

        $im = imagecreatetruecolor($imgWidth, $imgHeight);

        $white = imagecolorallocate($im, 255, 255, 255);
        $ink = imagecolorallocate($im, 15, 23, 42); // #0f172a

        imagefilledrectangle($im, 0, 0, $imgWidth - 1, $imgHeight - 1, $white);

        $x = 0;
        foreach ($bars as $b) {
            if ($b === 1) {
                imagefilledrectangle($im, $x, $paddingY, $x + $w - 1, $paddingY + $barcodeHeight - 1, $ink);
            }
            $x += $w;
        }

        ob_start();
        imagepng($im);
        $pngData = ob_get_clean();
        imagedestroy($im);

        $base64 = base64_encode($pngData);

        return '<div style="display:flex; flex-direction:column; align-items:center; gap:4px;">'
            . '<img alt="barcode" src="data:image/png;base64,' . $base64 . '" style="display:block; max-width:100%; height:auto;" />'
            . '</div>';
    }
}
