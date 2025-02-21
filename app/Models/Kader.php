<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    protected $table = 'nakes';
    protected $fillable = ['nik', 'kd_nakes', 'nama', 'jns_klmn', 'alamat', 'no_hp', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->kd_nakes = self::generateKader();
        });
    }
    public static function generateKader()
    {
        $lastRecord = DB::table('nakes')
            ->join('users', 'users.id', '=', 'nakes.user_id')
            ->where('users.role_id', 2)
            ->orderBy('kd_nakes', 'desc')
            ->select('nakes.*')
            ->first();

        if (!$lastRecord) {
            $number = 1;
        } else {
            $lastNumber = (int)substr($lastRecord->kd_nakes, 3);
            $number = $lastNumber + 1;
        }

        return 'KDR' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }
}
