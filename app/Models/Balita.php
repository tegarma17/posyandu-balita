<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    protected $table = 'balitas';
    protected $fillable = [
        'user_id',
        'kd_ktkbp',
        'kd_kcmtn',
        'kd_desa',
        'nik',
        'no_kk',
        'no_kk_ortu',
        'nama',
        'jns_klmn',
        'tgl_lahir',
        'tmpt_lahir',
        'bb_awal',
        'tb_awal',
        'nama_ortu',
        'no_hp_ortu',
        'anak_ke',
        'alamat',
        'prov',
        'rt',
        'rw'
    ];

    public function ktkbp()
    {
        return $this->belongsTo(Ktkbp::class);
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function antrian()
    {
        return $this->hasOne(Antrian::class, 'id_balita');
    }
    public function penimbangan()
    {
        return $this->hasOne(Penimbangan::class, 'id_balita');
    }
    public function vakimun()
    {
        return $this->hasMany(Vakimun::class, 'id_vakimun');
    }

    public static function generateBalita()
    {
        $latesBalita = User::where('username', 'like', 'BLT%')->orderBy('username', 'desc')->first();

        if (!$latesBalita) {
            $number = 1;
        } else {
            $lastNumber = (int)substr($latesBalita->username, 4);
            $number = $lastNumber + 1;
        }
        return 'BLT' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public static function getBabyAge($id)
    {
        return DB::table('balitas')
            ->select(DB::raw('CEIL(TIMESTAMPDIFF(MONTH, tgl_lahir, CURDATE())) as usia'))
            ->where('id', $id)
            ->first();
    }
    public static function HealthWeight($id)
    {
        return self::join('penimbangans', 'penimbangans.id_balita', '=', 'balitas.id')
            ->join('pengukurans', 'pengukurans.id_balita', '=', 'balitas.id')
            ->select('balitas.*', 'penimbangans.*', 'pengukurans.*')
            ->where('balitas.id', '=', $id)
            ->get();
    }
}
