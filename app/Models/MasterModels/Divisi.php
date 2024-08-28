<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'master_divisi';
    protected $primaryKey = 'kd_divisi';
    protected $fillable = [
        'divisi',
        'kd_direktorat',
        'status_enabled'
    ];
}

?>
