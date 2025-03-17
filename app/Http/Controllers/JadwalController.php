<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Desa;
use App\Models\Kader;
use App\Models\Nakes;
use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Antrian;
use App\Models\Posyandu;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use function PHPUnit\Framework\isEmpty;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Jadwal Posyandu';
        $kecamatan = Kecamatan::all();
        $posyandu = Posyandu::all();
        $desa = Desa::all();
        $provinsi = Provinsi::all();

        Carbon::setLocale('id');
        $today = now()->toDateString();
        $cek = Jadwal::whereDate('jadwal_posyandu', $today)->first();
        $tanggal_jadwal = Jadwal::select('jadwal_posyandu')
            ->distinct()
            ->orderBy('jadwal_posyandu', 'desc')
            ->paginate(5)
            ->fragment('std');
        if ($cek == null) {
            $nakes = Nakes::whereHas('user.role', function ($query) {
                $query->where('nama_role', 'Tenaga Kesehatan');
            })->get();
            $kader = Kader::whereHas('user.role', function ($query) {
                $query->where('nama_role', 'Kader Posyandu');
            })->get();
        } else {
            $assignedNakesIds = Jadwal::pluck('nakes_id')->toArray();
            $nakes = Nakes::whereHas('user.role', function ($query) {
                $query->where('nama_role', 'Tenaga Kesehatan');
            })->whereNotIn('id', $assignedNakesIds)->get();

            $assignedKaderIds = Jadwal::pluck('nakes_id')->toArray();
            $kader = Kader::whereHas('user.role', function ($query) {
                $query->where('nama_role', 'Kader Posyandu');
            })->whereNotIn('id', $assignedKaderIds)->get();
        }

        return view('admin.jadwal.jadwal', compact('title', 'kecamatan', 'desa', 'posyandu', 'nakes', 'kader', 'tanggal_jadwal', 'cek'));
    }

    public function detailJadwal($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $title = 'Jadwal Posyandu';
        $jadwalData = Jadwal::select('posyandu_id', 'jadwal_posyandu')
            ->where('jadwal_posyandu', $id)
            ->distinct()
            ->get();
        return view('admin.detailJadwal', compact('jadwalData', 'title'));
    }
    public function detailPetugas($jadwal_posyandu, $id_psynd)
    {
        $title = 'Jadwal Posyandu';
        $tanggalSpesifik = Jadwal::select('posyandu_id', 'jadwal_posyandu')
            ->where('posyandu_id', $id_psynd)
            ->where('jadwal_posyandu', $jadwal_posyandu)
            ->first();

        $coba = Jadwal::where('posyandu_id', $tanggalSpesifik->posyandu_id)
            ->where('jadwal_posyandu', $tanggalSpesifik->jadwal_posyandu)
            ->get();

        return view('admin.detailPetugas', compact('coba', 'title'));
    }

    public function updateByJadwal(Request $request)
    {

        $selesai = $request->input('selesai_posyandu');
        $idPosyandu = $request->input('id_psynd');
        $data = [
            'jadwal_posyandu' => Carbon::parse($request->input('jadwal_posyandu'))->format('Y-m-d H:i'),
            'selesai_posyandu' => Carbon::parse($request->input('selesai_posyandu'))->format('Y-m-d H:i'),
        ];

        $today = now()->toDateString();

        if ($today > $selesai) {
            return redirect()->route('jadwal.index')->with('error', 'Posyandu Sudah dilakukan');
        } else {
            DB::table('jadwals')
                ->where('id_psynd', $idPosyandu)
                ->update($data);
            return redirect()->route('jadwal.index')->with('success', 'Data berhasil diperbarui!');
        }
    }



    public function showNksKdr()
    {

        $id = Auth::user()->id;
        $cek = Nakes::where('user_id', $id)->first();

        $jadwal_posyandu = Jadwal::where('nakes_id', $cek->id)
            ->orderBy('selesai_posyandu', 'desc')->first();

        $jadwal = now()->format('m-d');
        $selesaiPosyandu = \Carbon\Carbon::parse($jadwal_posyandu->selesai_posyandu)->format('m-d');
        if ($jadwal <= $selesaiPosyandu) {
            $jadwal_posyandu = Jadwal::where('nakes_id', $cek->id)
                ->orderBy('selesai_posyandu', 'desc')->first();
        } else {
            $jadwal_posyandu = null;
        }
        $title = 'Jadwal Posyandu';
        return view('nakes.jadwal', compact('title', 'jadwal_posyandu', 'selesaiPosyandu'));
    }

    public function showJadwal()
    {
        $title = 'Jadwal Posyandu';
        $id_user = Auth::user()->id;
        $id_balita = Balita::where('user_id', $id_user)->first();
        $antrian = Antrian::where('id_balita', $id_balita->id)->first();
        $jadwal = Jadwal::with('posyandu')
            ->get()
            ->unique('id_psynd');
        return view('balita.jadwal', compact('title', 'jadwal', 'antrian'));
    }
    public function ambilAntri($id)
    {

        $id_user = Auth::user()->id;
        $cek = Balita::where('user_id', $id_user)->first();
        $data = [
            'id_balita' => $cek->id,
            'id_jadwal' => $id,
            'no_antri' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Antrian::insert($data);
        return redirect()->route('home')->with('success', 'Jadwal Berhasil ditambahkan');
    }
    public function store(Request $request)
    {
        $id_psynd = $request->input('id_psynd');
        $nakes_id = $request->input('id_nakes');
        $jadwal_posyandu = $request->input('jadwal_posyandu');
        $selesai_posyandu = $request->input('selesai_posyandu');

        $data = [];
        foreach ($nakes_id as $nakes) {
            $data[] = [
                'posyandu_id' => $id_psynd,
                'nakes_id' =>  $nakes,
                'jadwal_posyandu' => $jadwal_posyandu,
                'selesai_posyandu' => $selesai_posyandu,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        Jadwal::insert($data);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $ambilJadwal = Jadwal::findOrFail($id);
        dump($ambilJadwal);
        $dateFormat = \Carbon\Carbon::parse($ambilJadwal['jadwal_posyandu'])->locale('id')->isoFormat('dddd, MMMM Do YYYY, HH:mm');
        $dateFormat2 = \Carbon\Carbon::parse($ambilJadwal['selesai_posyandu'])->locale('id')->isoFormat('dddd, MMMM Do YYYY, HH:mm');
        dump($ambilJadwal);

        $nakes = Jadwal::where('id_psynd', $ambilJadwal->id_psynd)
            ->where('selesai_posyandu', $ambilJadwal->selesai_posyandu)
            ->whereHas('nakes.user.role', function ($query) {
                $query->where('nama_role', 'Tenaga Kesehatan');
            })
            ->with(['nakes.user.role'])
            ->get();

        $kader = Jadwal::where('id_psynd', $ambilJadwal->id_psynd)
            ->where('selesai_posyandu', $ambilJadwal->selesai_posyandu)
            ->whereHas('nakes.user.role', function ($query) {
                $query->where('nama_role', 'Kader Posyandu');
            })
            ->with(['nakes.user.role'])
            ->get();

        $title = 'Jadwal Posyandu';
        return view('detailjadwal', compact('id', 'title', 'ambilJadwal', 'nakes', 'kader', 'dateFormat', 'dateFormat2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $jadwal = Jadwal::find($id);
        $kecamatan = Kecamatan::all();
        $posyandu = Posyandu::all();
        $desa = Desa::all();
        $assignedNakesIds = Jadwal::pluck('nakes_id')->toArray();
        $nakes = Nakes::whereHas('user.role', function ($query) {
            $query->where('nama_role', 'Tenaga Kesehatan');
        })->whereNotIn('id', $assignedNakesIds)->get();
        $kader = Nakes::whereHas('user.role', function ($query) {
            $query->where('nama_role', 'Kader Posyandu');
        })->get();
        return view('editJadwal', compact('kecamatan', 'posyandu', 'desa', 'jadwal', 'nakes', 'kader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal telah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal telah dihapus');
    }
}
