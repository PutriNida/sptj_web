<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSosial extends Model
{
    use HasFactory;

    protected $table = 'media_sosial';
    protected $primaryKey = 'no_media_sosial';
    protected $fillable = [
        'kd_media_sosial',
        'username_media_sosial',
        'url',
        'publish'
    ];
}

?>