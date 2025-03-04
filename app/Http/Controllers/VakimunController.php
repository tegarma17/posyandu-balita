<?php

namespace App\Http\Controllers;

use App\Models\Nakes;
use App\Models\Jadwal;
use App\Models\Antrian;
use App\Models\Vakimun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VakimunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Vaksin & Imunisasi Balita';
        $UserID = Auth::user()->id;
        $NakesID = Nakes::where('user_id', $UserID)->first();
        $jadwalPosyandu = Jadwal::where('id_nakes', $NakesID->id)->first();
        $antrianBalita = Antrian::where('id_jadwal', $jadwalPosyandu->id)->get();
        return view('vip.vakimunBalita', compact('title', 'antrianBalita'));
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
    public function show(Vakimun $vakimun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vakimun $vakimun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vakimun $vakimun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vakimun $vakimun)
    {
        //
    }
}
