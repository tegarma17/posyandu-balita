<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table = 'desa';
    protected $fillable = [
        'kd_kcmtn',
        'kd_desa',
        'nm_desa',

    ];
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kd_kcmtn', 'kd_kcmtn');
    }
    public function posyandu()
    {
        return $this->hasMany(Posyandu::class);
    }
}
