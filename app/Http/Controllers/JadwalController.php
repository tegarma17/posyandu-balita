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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Jadwal Posyandu';
        $kecamatan = Kecamatan::all();
        $posyandu = Posyandu::all();
        $desa = Desa::all();
        $search = $request->input('search');
        $tanggal_jadwal = Jadwal::select('jadwal_posyandu')
            ->distinct()
            ->orderBy('jadwal_posyandu', 'desc')
            ->paginate(5)
            ->fragment('std');

        Carbon::setLocale('id');
        if (!empty($search)) {
            $jadwal = Jadwal::with('nakes')
                ->whereHas('nakes', function ($query) use ($search) {
                    $query->where('nama', 'like', '%' . $search . '%');
                })
                ->paginate(5)->fragment('std');
        } else {
            $jadwal = Jadwal::paginate(5)->fragment('std');
        }
        $today = now()->toDateString();
        $cek = Jadwal::whereDate('selesai_posyandu', $today)->first();

        if ($cek == null) {
            $assignedNakesIds = Jadwal::pluck('id_nakes')->toArray();
            $nakes = Nakes::whereHas('user.role', function ($query) {
                $query->where('nama_role', 'Tenaga Kesehatan');
            })->get();

            $assignedKaderIds = Jadwal::pluck('id_nakes')->toArray();
            $kader = Kader::whereHas('user.role', function ($query) {
                $query->where('nama_role', 'Kader Posyandu');
            })->get();
        } else {
            $assignedNakesIds = Jadwal::pluck('id_nakes')->toArray();
            $nakes = Nakes::whereHas('user.role', function ($query) {
                $query->where('nama_role', 'Tenaga Kesehatan');
            })->whereNotIn('id', $assignedNakesIds)->get();

            $assignedKaderIds = Jadwal::pluck('id_nakes')->toArray();
            $kader = Kader::whereHas('user.role', function ($query) {
                $query->where('nama_role', 'Kader Posyandu');
            })->whereNotIn('id', $assignedKaderIds)->get();
        }
        return view('jadwal', compact('title', 'kecamatan', 'desa', 'posyandu', 'nakes', 'kader', 'jadwal', 'tanggal_jadwal'));
    }

    public function detailJadwal($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $title = 'Jadwal Posyandu';
        $coba = Jadwal::select('id_psynd')
            ->where('jadwal_posyandu', $id)
            ->distinct()
            ->paginate(5)->fragment('std');
        foreach ($coba as $cba) {
            $cek = Jadwal::where('jadwal_posyandu', $id)
                ->where('id_psynd', $cba->id_psynd)->first();
        }
        return view('admin.detailJadwal', compact('coba', 'title', 'cek'));
    }


    public function updateByJadwal(Request $request)
    {

        $selesai = $request->input('selesai_posyandu');
        $idPosyandu = $request->input('id_psynd');
        $dataToUpdate = $request->only('jadwal_posyandu');
        $today = now()->toDateString();

        if ($today > $selesai) {
            return redirect()->route('jadwal.index')->with('error', 'Posyandu Sudah dilakukan');
        } else {
            DB::table('jadwals')
                ->where('id_psynd', $idPosyandu)
                ->update($dataToUpdate);
            return redirect()->route('jadwal.index')->with('success', 'Data berhasil diperbarui!');
        }
    }

    public function detailPetugas($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $title = 'Jadwal Posyandu';
        $coba = Jadwal::where('id_psynd', $id)
            ->paginate(5)->fragment('std');

        return view('admin.detailPetugas', compact('coba', 'title'));
    }

    public function showNksKdr()
    {

        $id = Auth::user()->id;
        $cek = Nakes::where('user_id', $id)->first();

        $jadwal_posyandu = Jadwal::where('id_nakes', $cek->id)
            ->orderBy('selesai_posyandu', 'desc')->first();
        $coba = now()->format('m-d');
        $selesaiPosyandu = \Carbon\Carbon::parse($jadwal_posyandu->selesai_posyandu)->format('m-d');
        if ($selesaiPosyandu == $coba) {
            $jadwal_posyandu = Jadwal::where('id_nakes', $cek->id)
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
        $id_nakes = $request->input('id_nakes');
        $jadwal_posyandu = $request->input('jadwal_posyandu');
        $selesai_posyandu = $request->input('selesai_posyandu');

        $data = [];
        foreach ($id_nakes as $nakes) {
            $data[] = [
                'id_psynd' => $id_psynd,
                'id_nakes' =>  $nakes,
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
        $dateFormat = \Carbon\Carbon::parse($ambilJadwal['jadwal_posyandu'])->locale('id')->isoFormat('dddd, MMMM Do YYYY, HH:mm');
        $dateFormat2 = \Carbon\Carbon::parse($ambilJadwal['selesai_posyandu'])->locale('id')->isoFormat('dddd, MMMM Do YYYY, HH:mm');

        $nakes = Jadwal::where('id_psynd', $ambilJadwal->id_psynd)
            ->whereHas('nakes.user.role', function ($query) {
                $query->where('nama_role', 'Tenaga Kesehatan');
            })
            ->with(['nakes.user.role'])
            ->get();
        $kader = Jadwal::where('id_psynd', $ambilJadwal->id_psynd)
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
        $assignedNakesIds = Jadwal::pluck('id_nakes')->toArray();
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
