<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganDarah extends Model
{
    use HasFactory;

    protected $table = 'master_gol_darah';
    protected $primaryKey = 'kd_gol_darah';
    protected $fillable = [
        'gol_darah',
        'status_enabled'
    ];
}

?>