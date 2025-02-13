<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $fillable = [
        'kd_ktkbp',
        'kd_kcmtn',
        'nm_kcmtn',
    ];

    public function ktkbp()
    {
        return $this->belongsTo(Ktkbp::class, 'kd_ktkbp', 'kd_ktkbp');
    }
    public function desa()
    {
        return $this->hasMany(Desa::class, 'kd_kcmtn', 'kd_kcmtn');
    }
}
