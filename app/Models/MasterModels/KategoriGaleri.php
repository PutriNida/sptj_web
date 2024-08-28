<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'master_kategori_galeri';
    protected $primaryKey = 'kd_kategori_galeri';
    protected $fillable = [
        'kategori_galeri',
        'status_enabled'
    ];
}

?>
