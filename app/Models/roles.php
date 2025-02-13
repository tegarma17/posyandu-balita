<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $fillable = [
        'nama_role'
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
