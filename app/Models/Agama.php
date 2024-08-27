<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = 'master_agama';
    protected $primaryKey = 'kd_agama';
    protected $fillable = [
        'agama',
        'status_enabled'
    ];
}

?>