<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Antrian extends Model
{
    protected $table = 'antrians';
    protected $fillable = ['id_jadwal', 'id_balita', 'no_antri'];

    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita');
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
