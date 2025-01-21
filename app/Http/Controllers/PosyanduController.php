<?php

namespace App\Http\Controllers;

use App\Models\Ktkbp;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\RedirectResponse;

class PosyanduController extends Controller
{
    public function index()
    {
        $ktkbp = Ktkbp::all();
        $kcmtn = Kecamatan::all();
        $desa = Desa::all();
        $psynd = 'Data Posyandu';

        return view('posyandu', compact('ktkbp', 'kcmtn', 'desa', 'psynd'));
    }

    public function store(Request $request): RedirectResponse
    {


        return redirect('/flights');
    }
}
