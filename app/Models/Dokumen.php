<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';

    protected $fillable = [
        'kd_jenis_dokumen',
        'nama',
        'file_base64',
        'mime_type',
        'ukuran',
        'keterangan',
        'publish',
        'publish_at',
    ];
}

