<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\User;
use App\Models\Ktkbp;
use App\Models\Balita;
use App\Models\Kecamatan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpParser\Node\Stmt\Return_;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $balita = Balita::where('nama', 'like', '%' . $search . '%')
                ->orWhere('nama_ortu', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%')
                ->orWhere('no_kk', 'like', '%' . $search . '%')
                ->orWhere('no_kk_ortu', 'like', '%' . $search . '%')
                ->orderBy('nama', 'ASC')
                ->paginate(5)->fragment('std');
        } else {
            $balita = Balita::paginate(5)->fragment('std');
        }
        $balita = Balita::paginate(5);
        $title = 'Data Balita';
        return view('balita', compact('balita', 'title', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode = Balita::generateBalita();

        $title = 'Tambah Data Balita';
        $ktkbp = Ktkbp::all();
        $kcmtn = Kecamatan::all();
        $desa = Desa::all();
        return view('tambahdtBalita', compact('title', 'ktkbp', 'kcmtn', 'desa', 'kode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $latesBalita = User::where('username', 'like', 'balita%')->orderBy('username', 'desc')->first();
        if ($latesBalita) {
            $latesNumber = intval(substr($latesBalita->username, 6));
            $newNumber = $latesNumber + 1;
        } else {
            $newNumber = 1;
        }
        $newUsername = 'BLT' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        User::create([
            'role_id' => '4',
            'username' => $newUsername,
            'password' => $newUsername
        ]);
        $balita = $request->all();
        $balita['user_id'] = User::latest()->first()->id;
        Balita::create($balita);
        return redirect()->route('balita.index')->with('success', 'Data Balita Baru telah ditambahkan.');
    }
    public function import(Request $request)
    {
        $file = $request->file('file');
        $spreadheet = IOFactory::load(($file->getPathname()));
        $rows = $spreadheet->getSheetByName('Balita')->toArray();

        foreach ($rows as $index => $row) {
            $kode = Balita::generateBalita();
            if ($index === 0) {
                continue;
            }
            Log::info("Processing row: " . json_encode($row));

            if (!empty($row[0]) && !empty($row[1]) && !empty($row[2])) {

                User::create([
                    'role_id' => 4,
                    'username' => $kode,
                    'password' => $kode,
                ]);

                Balita::updateOrCreate([
                    'user_id' => User::latest()->first()->id,
                    'kd_ktkbp' => $row[16],
                    'kd_kcmtn' => $row[18],
                    'kd_desa' => $row[20],
                    'nik' => $row[0],
                    'no_kk' => $row[1],
                    'no_kk_ortu' => $row[2],
                    'nama' => $row[3],
                    'jns_klmn' => $row[4],
                    'tgl_lahir' => $row[5],
                    'tmpt_lahir' => $row[6],
                    'bb_awal' => $row[7],
                    'tb_awal' => $row[8],
                    'nama_ortu' => $row[9],
                    'no_hp_ortu' => $row[10],
                    'anak_ke' => $row[11],
                    'alamat' => $row[12],
                    'prov' => $row[14],
                    'rt' => $row[21],
                    'rw' => $row[22],
                ]);
            }
        }
        return redirect()->route('balita.index')->with('success', 'Data Balita berhasil diimport');
    }

    public function edit(string $id)
    {
        $balita = Balita::find($id);
        $title = 'Edit Data Balita';
        $ktkbp = Ktkbp::all();
        $kcmtn = Kecamatan::all();
        $desa = Desa::all();
        return view('editBalita', compact('balita', 'title', 'ktkbp', 'kcmtn', 'desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $balita = Balita::find($id);
        $cek = $request->all();

        $balita->update($request->all());
        return redirect()->route('balita.index')->with('success', 'Data Balita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $balita = Balita::findOrFail($id);
        $user = User::findOrFail($balita->user_id);
        $balita->delete();
        $user->delete();
        return redirect()->route('balita.index')->with('success', 'Data Balita berhasil dihapus');
    }
}
