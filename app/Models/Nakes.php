<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nakes extends Model
{
    protected $table = 'nakes';
    protected $fillable = ['nik', 'kd_nakes', 'nama', 'jns_klmn', 'alamat', 'no_hp', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
