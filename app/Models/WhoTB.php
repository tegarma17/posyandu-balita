<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhoTB extends Model
{
    protected $table = 'whotb';
    protected $fillable = ['usia', 'mean_bb', 'std_dev'];
}
