<?php

namespace App\Http\Controllers;

use App\Models\Nakes;
use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Vaksin, Imunisasi, Penimbangan Balita';
        $namaBalita = $request->input('nama_balita');
        $namaOrtu = $request->input('nama_ortu');
        $UserID = Auth::user()->id;
        $NakesID = Nakes::where('user_id', $UserID)->first();
        $jadwalPosyandu = Jadwal::where('id_nakes', $NakesID->id)->first();
        $antrianBalita = Antrian::where('id_jadwal', $jadwalPosyandu->id)->get();
        // $jadwalBalita = Jadwal::where(
        $dataBalita = Balita::where('nama', $namaBalita)
            ->orWhere('nama_ortu', $namaOrtu)->first();

        return view('vipBalita', compact('title', 'antrianBalita', 'dataBalita'));
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
        //
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
