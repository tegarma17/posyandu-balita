<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nakes;
use Illuminate\Http\Request;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $kaders = Nakes::whereHas('user.role', function ($query) {
            $query->where('nama_role', 'Kader Posyandu');
        })->get();

        return view('kader', ['title' => 'Data Kader'], compact('kaders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode = Nakes::generateKader();


        User::create([
            'role_id' => 2,
            'username' => $kode,
            'password' => bcrypt($kode),

        ]);
        $nakes = $request->all();
        $nakes['user_id'] = User::latest()->first()->id;
        Nakes::create($nakes);
        return redirect()->route('kader.index')->with('success', 'Tenaga Kesehatan Baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
