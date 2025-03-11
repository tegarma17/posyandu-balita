<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    protected $table = 'pengukurans';
    protected $fillable = [
        'id_jadwal',
        'id_balita',
        'tinggi_badan',
        'tanggal_pengukuran',
        'jenis_pengukuran',
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
