<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKaryawan extends Model
{
    use HasFactory;

    protected $table = 'master_status_karyawan';
    protected $primaryKey = 'kd_status_karyawan';
    protected $fillable = [
        'status_karyawan',
        'status_enabled'
    ];
}

?>
