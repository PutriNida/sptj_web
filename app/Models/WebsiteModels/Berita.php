<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'no_berita';
    protected $fillable = [
        'kd_kategori_berita',
        'judul_berita',
        'content',
        'gambar',
        'no_anggota',
        'create_at',
        'update_at',
        'publish_at'
    ];
}

?>