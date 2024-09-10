<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarBerita extends Model
{
    use HasFactory;

    protected $table = 'histori_komenta_berita';
    protected $primaryKey = 'no_komen';
    protected $fillable = [
        'no_berita',
        'nama',
        'isAnonymous',
        'komentar',
        'create_at',
        'reply_to'
    ];
}

?>