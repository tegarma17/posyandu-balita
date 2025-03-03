<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Nakes;
use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Antrian;
use App\Models\Penimbangan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenimbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Vaksin, Imunisasi, Penimbangan Balita';

        $UserID = Auth::user()->id;
        $NakesID = Nakes::where('user_id', $UserID)->first();
        $jadwalPosyandu = Jadwal::where('id_nakes', $NakesID->id)->first();
        $antrianBalita = Antrian::where('id_jadwal', $jadwalPosyandu->id)->get();
        // $jadwalBalita = Jadwal::where(


        return view('vip.penimbangan', compact('title', 'antrianBalita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $antrianBalita = Antrian::where('id', $id)->first();
        $usia = DB::table('balitas')
            ->select(DB::raw('CEIL(TIMESTAMPDIFF(MONTH, tgl_lahir, CURDATE())) as usia'))
            ->where('id', $antrianBalita->balita->id)
            ->first();

        return view('vip.tambahPenimbangan', compact('antrianBalita', 'usia'));
    }
    public function hitungUsia() {}
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
    public function show(Penimbangan $penimbangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penimbangan $penimbangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penimbangan $penimbangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penimbangan $penimbangan)
    {
        //
    }
}
