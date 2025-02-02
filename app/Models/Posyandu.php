<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    protected $table = 'posyandu';
    protected $fillable = ['kecamatan_id', 'desa_id', 'ktkbp_id', 'kd_psynd', 'nm_psynd', 'alamat', 'prov'];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
