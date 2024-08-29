<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSosial extends Model
{
    use HasFactory;

    protected $table = 'master_media_sosial';
    protected $primaryKey = 'kd_media_sosial';
    protected $fillable = [
        'media_sosial',
        'ikon_media_sosial',
        'status_enabled'
    ];
}

?>
