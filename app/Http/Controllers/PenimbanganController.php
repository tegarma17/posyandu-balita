<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Nakes;
use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Antrian;
use App\Models\Penimbangan;
use App\Models\WhoBB;
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
        $title = 'Data Penimbangan Balita';

        $UserID = Auth::user()->id;
        $NakesID = Nakes::where('user_id', $UserID)->first();
        $jadwalPosyandu = Jadwal::where('id_nakes', $NakesID->id)->first();
        $balita = Balita::all();

        return view('vip.penimbangan', compact('title', 'balita', 'jadwalPosyandu'));
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
        $edit = Penimbangan::where('id_balita', $balita->id)->first();
        $rekap = Penimbangan::where('id_balita', $balita->id)->get();
        return view('vip.tambahPenimbangan', compact('jadwalPosyandu', 'usia', 'rekap', 'balita', 'edit'));
    }

    public function store(Request $request)
    {

        $idJadwal = $request->input('id_jadwal');
        $idBalita = $request->input('id_balita');
        $usia = $request->input('usia');
        $bb = $request->input('berat_badan');


        $whobb = WhoBB::where('usia', $usia)->first();
        $z_score = ($bb - $whobb->mean_bb) / $whobb->std_dev;
        if ($z_score < -3) {
            $status_bb = 'Gizi Buruk';
        } elseif ($z_score >= -3 && $z_score < -2) {
            $status_bb = 'Gizi Kurang';
        } elseif ($z_score >= -2 && $z_score <= 2) {
            $status_bb = 'Gizi Baik';
        } else {
            $status_bb = 'Gizi Lebih';
        }
        $data = [
            'id_jadwal' => $idJadwal,
            'id_balita' => $idBalita,
            'berat_badan' => $bb,
            'tanggal_penimbangan' => $request->tgl_penimbangan,
            'keterangan' => $request->keterangan,
            'status_gizi' => $status_bb,
            'usia' => $usia,
            'saran' => $request->saran,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Penimbangan::create($data);
        return redirect()->route('penimbangan.index')->with('succes', 'Pnimbangan Balita sudah tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rekap = Penimbangan::where('id_balita', $id);
        return view('vip.rekappenimbangan', compact('rekap'));
    }


    public function update(Request $request, string $id)
    {
        $penimbangan = Penimbangan::find($id);
        $usia = $request->input('usia');
        $bb = $request->input('berat_badan');
        $idBalita = $request->input('id_balita');

        $whobb = WhoBB::where('usia', $usia)->first();
        $z_score = ($bb - $whobb->mean_bb) / $whobb->std_dev;
        if ($z_score < -3) {
            $status_bb = 'Gizi Buruk';
        } elseif ($z_score >= -3 && $z_score < -2) {
            $status_bb = 'Gizi Kurang';
        } elseif ($z_score >= -2 && $z_score <= 2) {
            $status_bb = 'Gizi Baik';
        } else {
            $status_bb = 'Gizi Lebih';
        }
        $data = [
            'berat_badan' => $bb,
            'tanggal_penimbangan' => $request->tgl_penimbangan,
            'keterangan' => $request->keterangan,
            'status_gizi' => $status_bb,
            'usia' => $usia,
            'saran' => $request->saran,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $penimbangan->update($data);
        return redirect()->route('vip.penimbangan', $idBalita)->with('succes', 'Data Penimbangan balita telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penimbangan $penimbangan)
    {
        //
    }
}
