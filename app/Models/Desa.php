<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table = 'desa';
    protected $fillable = [
        'kcmtn_id',
        'kd_desa',
        'nm_desa',

    ];
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function posyandu()
    {
        return $this->hasMany(Posyandu::class);
    }
}
