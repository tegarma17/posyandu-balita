<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Balita;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balita = Balita::all();
        $title = 'Data Balita';
        return view('balita', compact('balita', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Data Balita';
        return view('tambahdtBalita', compact('title'));
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
        $newUsername = 'balita' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        User::create([
            'role_id' => '4',
            'username' => $newUsername,
            'password' => bcrypt('balita0001')
        ]);
        Balita::create($request->all());
        return redirect()->route('balita.index')->with('success', 'Data Balita Baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Balita $balita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $balita = Balita::find($id);
        return view('editBalita', compact('balita', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Balita $balita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Balita $balita)
    {
        //
    }
}
