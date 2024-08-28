<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKontak extends Model
{
    use HasFactory;

    protected $table = 'master_tipe_kontak';
    protected $primaryKey = 'kd_tipe_kontak';
    protected $fillable = [
        'tipe_kontak',
        'status_enabled'
    ];
}

?>
