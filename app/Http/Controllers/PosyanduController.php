<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Ktkbp;
use App\Models\Posyandu;
use App\Models\Kecamatan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PosyanduController extends Controller
{
    public function index()
    {
        $ktkbp = Ktkbp::all();
        $kcmtn = Kecamatan::all();
        $desa = Desa::all();
        $psyndu = Posyandu::with('desa')->get();
        $title = 'Data Posyandu';
        // $posyandu = Posyandu::with('desa')->get();


        return view('posyandu', compact('ktkbp', 'kcmtn', 'desa', 'title', 'psyndu'));
    }

    public function store(Request $request): RedirectResponse
    {
        Posyandu::create($request->all());
        return redirect()->route('psynd.index')->with('success', 'Posyandu Baru telah ditambahkan.');
    }
    public function destroy($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        $posyandu->delete();
        return redirect()->route('psynd.index')->with('success', 'Posyandu Terhapus.');
    }

    public function edit(string $id): View
    {
        $posyandu = Posyandu::find($id);
        $kecamatan = Kecamatan::all();
        $desa = Desa::where('kcmtn_id', $posyandu->kecamatan_id)->get();
        return view('editPosyandu', compact('posyandu', 'kecamatan', 'desa', 'id'));
    }


    public function update(Request $request, $id)
    {
        $posyandu = Posyandu::find($id);
        $posyandu->update($request->all());

        return redirect()->route('psynd.index')->with('success', 'Data Posyandu telah dirubah');
    }
}
