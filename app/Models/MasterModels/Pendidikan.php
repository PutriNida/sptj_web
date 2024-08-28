<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'master_pendidikan';
    protected $primaryKey = 'kd_pendidikan';
    protected $fillable = [
        'pendidikan',
        'status_enabled'
    ];
}

?>