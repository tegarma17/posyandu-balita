<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\User;
use App\Models\Ktkbp;
use App\Models\Balita;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balita = Balita::paginate(5);
        $title = 'Data Balita';
        return view('balita', compact('balita', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Data Balita';
        $ktkbp = Ktkbp::all();
        $kcmtn = Kecamatan::all();
        $desa = Desa::all();
        return view('tambahdtBalita', compact('title', 'ktkbp', 'kcmtn', 'desa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $latesBalita = User::where('username', 'like', 'balita%')->orderBy('username', 'desc')->first();
        if ($latesBalita) {
            $latesNumber = intval(substr($latesBalita->username, 6));
            $newNumber = $latesNumber + 1;
        } else {
            $newNumber = 1;
        }
        $newUsername = 'BLT' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        User::create([
            'role_id' => '4',
            'username' => $newUsername,
            'password' => $newUsername
        ]);
        $balita = $request->all();
        $balita['user_id'] = User::latest()->first()->id;
        Balita::create($balita);
        return redirect()->route('balita.index')->with('success', 'Data Balita Baru telah ditambahkan.');
    }


    public function edit(string $id)
    {
        $balita = Balita::find($id);
        $title = 'Edit Data Balita';
        $ktkbp = Ktkbp::all();
        $kcmtn = Kecamatan::all();
        $desa = Desa::all();
        return view('editBalita', compact('balita', 'title', 'ktkbp', 'kcmtn', 'desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $balita = Balita::find($id);
        $cek = $request->all();

        $balita->update($request->all());
        return redirect()->route('balita.index')->with('success', 'Data Balita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Balita $balita)
    {
        $balita = Balita::findOrFail($balita->id);
        $user = User::findOrFail($balita->user_id);
        $balita->delete();
        $user->delete();
    }
}
