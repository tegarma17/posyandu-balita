<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhoTB extends Model
{
    protected $table = 'whotb';
    protected $fillable = ['usia', 'jk', 'posisi', 'mean_tb',  'std_dev'];
}
