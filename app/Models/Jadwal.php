<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals';
    protected $fillable = ['id_psynd', 'id_nakes', 'jadwal_posyandu', 'selesai_posyandu'];

    public function nakes()
    {
        return $this->belongsTo(Nakes::class, 'nakes_id');
    }
    public function posyandu()
    {
        return $this->belongsTo(Posyandu::class, 'posyandu_id');
    }
    public function antrian()
    {
        return $this->hasMany(Antrian::class, 'id_jadwal');
    }
    public function penimbangan()
    {
        return $this->hasOne(Penimbangan::class, 'id_jadwal');
    }
    public function vakimun()
    {
        return $this->hasMany(Vakimun::class, 'id_vakimun');
    }
}
