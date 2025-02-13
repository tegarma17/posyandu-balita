<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ktkbp extends Model
{
    protected $table = 'ktkbp';
    protected $fillable = [
        'kd_ktkbp',
        'nm_ktkbp',

    ];
    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'kd_ktkbp', 'kd_ktkbp');
    }
}
