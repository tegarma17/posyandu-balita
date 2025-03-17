<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Penimbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        $tanggal_jadwal = Jadwal::select('jadwal_posyandu', 'id_psynd')
            ->distinct()
            ->orderBy('jadwal_posyandu', 'desc')
            ->paginate(5)
            ->fragment('std');
        Carbon::setLocale('id');

        $title = 'Laporan Posyandu';
        return view('laporan', compact('title', 'tanggal_jadwal'));
    }
    public function ReportCheck($dateReport, $id)
    {
        dump($dateReport);
        $date = $dateReport->format('yyyy-mm-dd');
        dump($date);
        $cek = Jadwal::where('id_psynd', $id)->get();
        dump($cek);
        //Berapa Balita yang timbang
        $reportWeight = Penimbangan::where('tanggal_penimbangan', $dateReport)
            ->first();
        dd($reportWeight);

        // Berapa balita yang vaksin
    }
}
