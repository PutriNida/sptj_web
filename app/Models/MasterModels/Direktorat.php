<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direktorat extends Model
{
    use HasFactory;

    protected $table = 'master_direktorat';
    protected $primaryKey = 'kd_direktorat';
    protected $fillable = [
        'direktorat',
        'status_enabled'
    ];
}

?>
