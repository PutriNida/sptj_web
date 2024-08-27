<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPerkawinan extends Model
{
    use HasFactory;

    protected $table = 'master_lokasi-kerja';
    protected $primaryKey = 'kd_lokasi_kerja';
    protected $fillable = [
        'lokasi_kerja',
        'status_enabled'
    ];
}

?>
