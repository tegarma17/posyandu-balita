<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penimbangan extends Model
{
    protected $table = 'penimbangans';
    protected $fillable = [
        'id_jadwal',
        'id_balita',
        'tinggi_badan',
        'berat_badan',
        'tanggal_penimbangan',
        'keterangan',
        'status_gizi',
        'usia',
        'jns_penimbangan',
        'saran'
    ];
}
