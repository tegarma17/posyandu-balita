<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penimbangan extends Model
{
    protected $table = 'penimbangans';
    protected $fillable = [
        'id_jadwal',
        'id_balita',
        'berat_badan',
        'tanggal_penimbangan',
        'keterangan',
        'status_gizi',
        'usia',
        'saran'
    ];
    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita');
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
