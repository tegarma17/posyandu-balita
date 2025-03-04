<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhoBB extends Model
{
    protected $table = 'whobb';
    protected $fillable = ['usia', 'mean_bb', 'std_dev'];
}
