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
    private $userID;
    private $NakesID;
    private $jadwalPosyandu;
    private $balita;

    public function initData()
    {

        $this->userID = Auth::user()->id;
        $this->NakesID = Nakes::where('user_id', $this->userID)->first();
        $this->jadwalPosyandu = Jadwal::where('id_nakes', $this->NakesID->id)->first();
        $this->balita = Balita::all();
    }
    public function index()
    {
        $this->initData();
        $title = 'Data Vaksin & Imunisasi Balita';
        $balita = $this->balita;
        $jadwalPosyandu = $this->jadwalPosyandu;

        return view('vip.vakimunBalita', compact('title', 'balita', 'jadwalPosyandu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $this->initData();
        $balita = $this->balita;
        $jadwalPosyandu = $this->jadwalPosyandu;
        $balita = Balita::where('id', $id)->first();
        $usia = Balita::getBabyAge($balita->id);
        $vaksin = DB::table('imunivaks')->get();
        $rekap = Vakimun::rekapVakimun($balita->id);
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
