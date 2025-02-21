<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    protected $table = 'posyandu';
    protected $fillable = ['kd_ktkbp', 'kd_kcmtn', 'kd_desa', 'kd_psynd', 'nm_psynd', 'alamat', 'prov'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->kd_psynd = self::generateKdPsynd();
        });
    }

    public static function generateKdPsynd()
    {
        $lastRecord = DB::table('posyandu')->orderBy('kd_psynd', 'desc')->first();

        if (!$lastRecord) {
            $number = 1;
        } else {
            $lastNumber = (int)substr($lastRecord->kd_psynd, 5);
            $number = $lastNumber + 1;
        }

        return 'PSYND' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'kd_desa', 'kd_desa');
    }
}
