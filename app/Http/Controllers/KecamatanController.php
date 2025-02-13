<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function getByProvinsi($id)
    {
        $kcmtn = Desa::where('kecamatan_id', $id)->get();
        return response()->json($kcmtn);
    }
}
