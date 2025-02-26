<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kader;
use App\Models\Nakes;
use App\Models\Jadwal;
use App\Models\Posyandu;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

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
        if (!empty($search)) {
            $jadwal = Jadwal::with('nakes')
                ->whereHas('nakes', function ($query) use ($search) {
                    $query->where('nama', 'like', '%' . $search . '%');
                })
                ->paginate(5)->fragment('std');
        } else {
            $jadwal = Jadwal::paginate(5)->fragment('std');
        }

        $assignedNakesIds = Jadwal::pluck('id_nakes')->toArray();
        $nakes = Nakes::whereHas('user.role', function ($query) {
            $query->where('nama_role', 'Tenaga Kesehatan');
        })->whereNotIn('id', $assignedNakesIds)->get();

        $assignedKaderIds = Jadwal::pluck('id_nakes')->toArray();
        $kader = Kader::whereHas('user.role', function ($query) {
            $query->where('nama_role', 'Kader Posyandu');
        })->whereNotIn('id', $assignedKaderIds)->get();



        return view('jadwal', compact('title', 'kecamatan', 'desa', 'posyandu', 'nakes', 'kader', 'jadwal'));
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
        return redirect()->route('jadwal.index')->with('succes', 'Jadwal Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ambilJadwal = Jadwal::findOrFail($id);
        $dateFormat = \Carbon\Carbon::parse($ambilJadwal['jadwal_posyandu'])->locale('id')->isoFormat('dddd, MMMM Do YYYY, HH:mm');

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
        return view('detailjadwal', compact('id', 'title', 'ambilJadwal', 'nakes', 'kader', 'dateFormat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
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
