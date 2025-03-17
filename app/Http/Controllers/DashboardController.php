<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Balita;
use App\Models\Nakes;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index()
    {

        $cek = Auth::user()->id;
        if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3) {
            $id_nakes = Nakes::where('user_id', $cek)->first();
            $jadwal = Jadwal::where('id_nakes', $id_nakes->id)
                ->orderBy('jadwal_posyandu', 'desc')->first();
            $tanggal = now()->format('m-d');
            $selesaiPosyandu = \Carbon\Carbon::parse($jadwal->selesai_posyandu)->format('m-d');
            $mulai = \Carbon\Carbon::parse($jadwal['jadwal_posyandu'])->locale('id')->isoFormat('dddd, MMMM Do YYYY, HH:mm');
            $selesai = \Carbon\Carbon::parse($jadwal['selesai_posyandu'])->locale('id')->isoFormat('dddd, MMMM Do YYYY, HH:mm');
            return view('templateNavbar', compact('jadwal', 'mulai', 'tanggal', 'selesai', 'selesaiPosyandu'));
        } elseif (Auth::user()->role_id == 4) {
            $id_balita = Balita::where('user_id', $cek)->first();
            $antrian = Antrian::where('id_balita', $id_balita->id)->first();
            if ($antrian == null) {
                $dateFormat = '';
            } else {
                $dateFormat = \Carbon\Carbon::parse($antrian->jadwal['jadwal_posyandu'])->locale('id')->isoFormat('dddd, MMMM Do YYYY, HH:mm');
            }
            return view('templateNavbar', compact('id_balita', 'antrian', 'dateFormat'));
        } else {
            return view('templateNavbar');
        }
    }
}
