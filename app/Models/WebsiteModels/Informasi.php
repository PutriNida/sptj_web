<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi';
    protected $primaryKey = 'no_informasi';
    protected $fillable = [
        'kd_kategori_informasi',
        'judul_informasi',
        'content',
        'gambar',
        'no_karyawan',
        'create_at',
        'update_at',
        'publish_at',
        'views',
        'likes',
        'dislikes'
    ];
}

?>