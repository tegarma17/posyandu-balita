<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $fillable = [
        'ktkbp_id',
        'kd_kcmtn',
        'nm_kcmtn',
    ];
    public function desa()
    {
        return $this->hasMany(Desa::class);
    }
}
