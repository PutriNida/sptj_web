<?php

namespace App\Http\Controllers\WebsiteControllers;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Exception;

class PendaftaranAnggotaController extends Controller
{
    private function getJenisKelamin()
    {
        return DB::table('master_jenis_kelamin')
            ->where('status_enabled', '=', '1')
            ->orderBy('kd_jenis_kelamin', 'asc')
            ->get();
    }

    private function getStatusPerkawinan()
    {
        return DB::table('master_status_perkawinan')
            ->where('status_enabled', '=', '1')
            ->orderBy('kd_status_perkawinan', 'asc')
            ->get();
    }

    private function getAgama()
    {
        return DB::table('master_agama')
            ->where('status_enabled', '=', '1')
            ->orderBy('kd_agama', 'asc')
            ->get();
    }

    private function getLokasiKerja()
    {
        return DB::table('master_lokasi_kerja')
            ->where('status_enabled', '=', '1')
            ->orderBy('kd_lokasi_kerja', 'asc')
            ->get();
    }

    public function create()
    {
        // Minimal field penting saja yang akan ditampilkan sebagai dropdown
        $jeniskelamin = $this->getJenisKelamin();
        $statusperkawinan = $this->getStatusPerkawinan();
        $agama = $this->getAgama();

        // kd_lokasi_kerja juga sering dipakai untuk field kerja; tampilkan jika ada di form
        $lokasikerja = $this->getLokasiKerja();

        return view('website_pages.pendaftaran_anggota', compact(
            'jeniskelamin',
            'statusperkawinan',
            'agama',
            'lokasikerja'
        ));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_karyawan' => ['required', 'string', 'max:255', 'unique:pendaftaran_anggota,no_karyawan'], // enforce unique in pending table
            'nik' => ['required', 'string', 'max:255'],
            'nik_sptj' => ['nullable', 'string', 'max:255'],
            'nama_lengkap' => ['required', 'string', 'max:255'],

            'tempat_lahir' => ['nullable', 'string', 'max:255'],
            'tgl_lahir' => ['nullable', 'date'],

            'kd_jenis_kelamin' => ['nullable', 'string', 'max:255'],
            'kd_status_perkawinan' => ['nullable', 'string', 'max:255'],
            'kd_agama' => ['nullable', 'string', 'max:255'],

            // optional mapping kerja (boleh kosong sesuai permintaan)
            'kd_lokasi_kerja' => ['nullable', 'string', 'max:255'],
            'kd_status_karyawan' => ['nullable', 'string', 'max:255'],
            'kd_divisi' => ['nullable', 'string', 'max:255'],
            'kd_departemen' => ['nullable', 'string', 'max:255'],
            'kd_jabatan' => ['nullable', 'string', 'max:255'],
            'kd_direktorat' => ['nullable', 'string', 'max:255'],

            'foto_diri' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ], [
            'no_karyawan.required' => 'Nomor induk karyawan wajib diisi.',
            'no_karyawan.unique' => 'Nomor induk karyawan sudah pernah diajukan.',
        ]);

        // Handle base64 foto (match pattern di MemberController)
        $base64Image = null;
        if ($request->hasFile('foto_diri')) {
            $file = $request->file('foto_diri');
            $imageData = file_get_contents($file->getRealPath());
            $base64Image = base64_encode($imageData);
            $mimeType = $file->getClientMimeType();
            $base64Image = 'data:' . $mimeType . ';base64,' . $base64Image;
        }

        $validator->after(function ($v) use ($request) {
            // Hard check: no_karyawan belum ada di tabel anggota juga
            $exists = DB::table('anggota')->where('no_karyawan', $request->no_karyawan)->exists();
            if ($exists) {
                $v->errors()->add('no_karyawan', 'Nomor induk karyawan sudah terdaftar sebagai anggota.');
            }
        });

        $validator->validate();

        try {
            PendaftaranAnggota::create([
                'no_karyawan' => $request->no_karyawan,
                'nik' => $request->nik,
                'nik_sptj' => $request->nik_sptj,
                'nama_lengkap' => $request->nama_lengkap,

                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,

                'kd_jenis_kelamin' => $request->kd_jenis_kelamin,
                'kd_status_perkawinan' => $request->kd_status_perkawinan,
                'kd_agama' => $request->kd_agama,

                'kd_direktorat' => $request->kd_direktorat,
                'kd_divisi' => $request->kd_divisi,
                'kd_departemen' => $request->kd_departemen,
                'kd_jabatan' => $request->kd_jabatan,
                'kd_lokasi_kerja' => $request->kd_lokasi_kerja,
                'kd_status_karyawan' => $request->kd_status_karyawan,

                'foto_diri' => $base64Image,

                'status' => 'pending',
            ]);

            return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim. Tunggu persetujuan admin.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan pendaftaran. ' . $e->getMessage());
        }
    }
}
