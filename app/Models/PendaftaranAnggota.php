<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranAnggota extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_anggota';

    // default: id
    protected $fillable = [
        'no_karyawan',
        'nik',
        'nik_sptj',
        'nama_lengkap',
        'tempat_lahir',
        'tgl_lahir',
        'kd_jenis_kelamin',
        'kd_status_perkawinan',
        'kd_agama',
        'kd_direktorat',
        'kd_divisi',
        'kd_departemen',
        'kd_jabatan',
        'kd_lokasi_kerja',
        'kd_status_karyawan',
        'foto_diri',
        'status',
        'approved_by',
        'approved_at',
        'rejected_by',
        'rejected_at',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];
}
