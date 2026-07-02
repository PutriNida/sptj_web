<?php

namespace App\Models\MasterModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJenisDokumen extends Model
{
    use HasFactory;

    protected $table = 'master_jenis_dokumen';

    protected $fillable = [
        'nama_jenis_dokumen',
    ];
}

