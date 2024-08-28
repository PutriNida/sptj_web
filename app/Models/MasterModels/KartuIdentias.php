<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuIdentias extends Model
{
    use HasFactory;

    protected $table = 'master_kartu_identitas';
    protected $primaryKey = 'kd_kartu_identitas';
    protected $fillable = [
        'kartu_identitas',
        'status_enabled'
    ];
}

?>
