<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $fillable = ['kd_prov', 'nama'];

    public function ktkbp()
    {
        return $this->hasMany(Ktkbp::class, 'prov_id');
    }
}
