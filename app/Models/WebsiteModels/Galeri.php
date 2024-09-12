<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $primaryKey = 'no_galeri';
    protected $fillable = [
        'kd_kategori_galeri',
        'keterangan',
        'gambar',
        'no_karyawan',
        'create_at',
        'publish_at',
        'views'
    ];
}

?>