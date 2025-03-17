<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ktkbp extends Model
{
    protected $table = 'ktkbp';
    protected $fillable = [
        'prov_id',
        'kd_ktkbp',
        'nama',

    ];
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'prov_id');
    }
    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'ktkbp_id');
    }
}
