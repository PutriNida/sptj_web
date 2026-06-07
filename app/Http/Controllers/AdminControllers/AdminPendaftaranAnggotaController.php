<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdminPendaftaranAnggotaController extends Controller
{
    public function index()
    {
        $pending = DB::table('pendaftaran_anggota')
            ->where('status', '=', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin_pages.pendaftaran_anggota.index', compact('pending'));
    }

    public function show($id)
    {
        $data = DB::table('pendaftaran_anggota')
            ->where('id', '=', $id)
            ->first();

        if (!$data) {
            abort(404);
        }

        return view('admin_pages.pendaftaran_anggota.show', compact('data'));
    }

    public function approve($id)
    {
        try {
            $data = DB::table('pendaftaran_anggota')->where('id', '=', $id)->first();
            if (!$data) {
                abort(404);
            }

            if ($data->status !== 'pending') {
                return redirect()->route('admin_pendaftaran_anggota.index')
                    ->with('error', 'Pengajuan sudah diproses.');
            }

            // Guard: no_karyawan harus unik di anggota
            $existsMember = DB::table('anggota')
                ->where('no_karyawan', '=', $data->no_karyawan)
                ->exists();

            if ($existsMember) {
                // Jangan approve kalau sudah ada
                return redirect()->route('admin_pendaftaran_anggota.index')
                    ->with('error', 'No. induk karyawan sudah terdaftar sebagai anggota. Pengajuan gagal di-approve.');
            }

            DB::transaction(function () use ($id, $data) {
                // Insert ke anggota - mapping minimal sesuai field yang ada
                DB::table('anggota')->insert([
                    'no_karyawan' => $data->no_karyawan,
                    'nik' => $data->nik,
                    'nik_sptj' => $data->nik_sptj,
                    'nama_lengkap' => $data->nama_lengkap,

                    'tempat_lahir' => $data->tempat_lahir,
                    'tgl_lahir' => $data->tgl_lahir,

                    'kd_jenis_kelamin' => $data->kd_jenis_kelamin,
                    'kd_status_perkawinan' => $data->kd_status_perkawinan,
                    'kd_agama' => $data->kd_agama,

                    // Data kerja (nullable di anggota)
                    'kd_direktorat' => $data->kd_direktorat,
                    'kd_divisi' => $data->kd_divisi,
                    'kd_departemen' => $data->kd_departemen,
                    'kd_jabatan' => $data->kd_jabatan,
                    'kd_lokasi_kerja' => $data->kd_lokasi_kerja,
                    'kd_status_karyawan' => $data->kd_status_karyawan,

                    'foto_diri' => $data->foto_diri,

                    // field lain tidak di-set (dianggap default/nullable di DB)
                ]);

                $approvedBy = null;

                // session/username admin di project ini tidak jelas; fallback ke no_karyawan dari session bila ada
                if (session()->has('no_karyawan')) {
                    $approvedBy = session('no_karyawan');
                } else {
                    $approvedBy = Auth::user()->username ?? null;
                }

                DB::table('pendaftaran_anggota')
                    ->where('id', '=', $id)
                    ->update([
                        'status' => 'approved',
                        'approved_by' => $approvedBy,
                        'approved_at' => now(),
                        'updated_at' => now(),
                    ]);
            });

            return redirect()->route('admin_pendaftaran_anggota.index')
                ->with('success', 'Pengajuan berhasil di-approve menjadi anggota.');
        } catch (Exception $e) {
            return redirect()->route('admin_pendaftaran_anggota.index')
                ->with('error', 'Gagal approve: ' . $e->getMessage());
        }
    }

    public function reject($id)
    {
        try {
            $data = DB::table('pendaftaran_anggota')->where('id', '=', $id)->first();
            if (!$data) {
                abort(404);
            }

            if ($data->status !== 'pending') {
                return redirect()->route('admin_pendaftaran_anggota.index')
                    ->with('error', 'Pengajuan sudah diproses.');
            }

            $rejectedBy = null;
            if (session()->has('no_karyawan')) {
                $rejectedBy = session('no_karyawan');
            } else {
                $rejectedBy = Auth::user()->username ?? null;
            }

            DB::table('pendaftaran_anggota')
                ->where('id', '=', $id)
                ->update([
                    'status' => 'rejected',
                    'rejected_by' => $rejectedBy,
                    'rejected_at' => now(),
                    'updated_at' => now(),
                ]);

            return redirect()->route('admin_pendaftaran_anggota.index')
                ->with('success', 'Pengajuan berhasil ditolak.');
        } catch (Exception $e) {
            return redirect()->route('admin_pendaftaran_anggota.index')
                ->with('error', 'Gagal reject: ' . $e->getMessage());
        }
    }
}
