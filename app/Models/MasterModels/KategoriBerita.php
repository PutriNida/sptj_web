<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'master_kategori_berita';
    protected $primaryKey = 'kd_kategori_berita';
    protected $fillable = [
        'kategori_berita',
        'status_enabled'
    ];
}

?>
