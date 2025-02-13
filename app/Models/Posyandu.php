<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    protected $table = 'posyandu';
    protected $fillable = ['kd_ktkbp', 'kd_kcmtn', 'kd_desa', 'kd_psynd', 'nm_psynd', 'alamat', 'prov'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'kd_desa', 'kd_desa');
    }
}
