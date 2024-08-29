<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubunganKeluarga extends Model
{
    use HasFactory;

    protected $table = 'master_hub_keluarga';
    protected $primaryKey = 'kd_hub_keluarga';
    protected $fillable = [
        'hub_keluarga',
        'status_enabled'
    ];
}

?>
