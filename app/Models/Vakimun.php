<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vakimun extends Model
{
    protected $table = 'vakimuns';
    protected $fillable = ['id_jadwal', 'id_imunivak', 'id_balita', 'tanggal_imunivak', 'usia'];

    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public static function rekapVakimun($id)
    {
        return self::join('imunivaks', 'vakimuns.id_imunivak', '=', 'imunivaks.id')
            ->join('balitas', 'vakimuns.id_balita', '=', 'balitas.id')
            ->select('vakimuns.*', 'balitas.*', 'imunivaks.nama_vksn_imun as nama_imunivak')
            ->where('balitas.id', '=', $id)
            ->get();
    }
}
