<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhoBB extends Model
{
    protected $table = 'whobb';
    protected $fillable = ['jk', 'usia', 'mean_bb', 'std_dev'];
}
