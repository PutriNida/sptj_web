<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'master_jabatan';
    protected $primaryKey = 'kd_jabatan';
    protected $fillable = [
        'jabatan',
        'kd_departemen',
        'status_enabled'
    ];
}

?>
