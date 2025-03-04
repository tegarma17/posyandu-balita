<?php

namespace App\Http\Controllers;

use App\Models\Nakes;
use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Antrian;
use App\Models\Imunivak;
use App\Models\Vakimun;
use App\Models\Penimbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $balita = Balita::all();

        return view('vip.vakimunBalita', compact('title', 'balita', 'jadwalPosyandu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $UserID = Auth::user()->id;
        $NakesID = Nakes::where('user_id', $UserID)->first();
        $jadwalPosyandu = Jadwal::where('id_nakes', $NakesID->id)->first();
        $balita = Balita::where('id', $id)->first();
        $usia = DB::table('balitas')
            ->select(DB::raw('CEIL(TIMESTAMPDIFF(MONTH, tgl_lahir, CURDATE())) as usia'))
            ->where('id', $balita->id)
            ->first();
        $vaksin = DB::table('imunivaks')->get();

        $rekap = DB::table('vakimuns')
            ->join('imunivaks', 'vakimuns.id_imunivak', '=', 'imunivaks.id')
            ->join('balitas', 'vakimuns.id_balita', '=', 'balitas.id')
            ->select('vakimuns.*', 'balitas.*', 'imunivaks.nama_vksn_imun as nama_imunivak')
            ->where('balitas.id', '=', $balita->id)
            ->get();
        dump($rekap);
        return view('vip.suntikimunivak', compact('jadwalPosyandu', 'usia', 'rekap', 'balita', 'vaksin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idJadwal = $request->input('id_jadwal');
        $idBalita = $request->input('id_balita');
        $usia = $request->input('usia');
        $data = [
            'id_jadwal' => $idJadwal,
            'id_balita' => $idBalita,
            'id_imunivak' => $request->id_imunivak,
            'tanggal_imunivak' => $request->tanggal_imunivak,
            'usia' => $usia,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Vakimun::create($data);
        return redirect()->route('vakimun.index')->with('succes', 'Data Vaksi/Imunisasi berhasil disimpan');
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
