<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals';
    protected $fillable = ['id_psynd', 'id_nakes', 'jadwal_posyandu', 'selesai_posyandu'];

    public function nakes()
    {
        return $this->belongsTo(Nakes::class, 'id_nakes');
    }
    public function posyandu()
    {
        return $this->belongsTo(Posyandu::class, 'id_psynd');
    }
}
