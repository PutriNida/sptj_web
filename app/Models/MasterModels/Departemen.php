<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $table = 'master_departemen';
    protected $primaryKey = 'kd_departemen';
    protected $fillable = [
        'departemen',
        'status_enabled'
    ];
}

?>
