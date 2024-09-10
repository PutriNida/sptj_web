<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $primaryKey = 'no_karyawan';
    protected $fillable = [
        'foto_diri',
        'gelar_belakang',
        'gelar_depan',
        'jum_anak',
        'jum_tanggungan',
        'kd_agama',
        'kd_departemen',
        'kd_direktorat',
        'kd_divisi',
        'kd_gol_darah',
        'kd_jabatan',
        'kd_jenis_kelamin',
        'kd_lokasi_kerja',
        'kd_status_karyawan',
        'kd_status_perkawinan',
        'nama_lengkap',
        'nik',
        'nik_sptj',
        'tempat_lahir',
        'tgl_lahir',
        'level'
    ];
}

?>