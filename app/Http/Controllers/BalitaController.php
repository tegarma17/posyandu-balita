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
                ->orderBy('nama', 'ASC')
                ->paginate(5)->fragment('std');
        } else {
            $balita = Balita::paginate(5)->fragment('std');
        }

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
        $validate = $request->validate([
            'kd_ktkbp' => 'required',
            'kd_kcmtn' => 'required',
            'kd_desa' => 'required',
            'user_id' => 'required|unique:balitas',
            'nik' => 'required|unique:balitas',
            'no_kk' => 'required|unique:balitas',
            'no_kk_ortu' => 'required|unique:balitas',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tmpt_lahir' => 'required',
            'bb_awal' => 'required|numeric',
            'tb_awal' => 'required|numeric',
            'nama_ortu' => 'required',
            'no_hp_ortu' => 'required|numeric',
            'prov' => 'required',

        ], [
            'kd_ktkbp.required' => 'Kota / Kabupaten Wajib diisi',
            'kd_kcmtn.required' => 'Kecamatan Wajib diisi',
            'kd_desa.required' => 'Desa Wajib diisi',
            'user_id.required' => 'User ID Wajib diisi',
            'user_id.unique' => 'User ID sudah terdaftar',
            'nik.required' => 'NIK Wajib diisi',
            'nik.unique' => 'NIK sudah terdaftar',
            'no_kk.required' => 'Nomer KK Wajib diisi',
            'no_kk.unique' => 'Nomer KK sudah terdaftar',
            'no_kk_ortu.required' => 'NIK Orang Tua Wajib diisi',
            'no_kk_ortu.unique' => 'NIK Orang Tua sudah terdaftar',
            'nama.required' => 'Nama Balita wajib diisi',
            'tgl_lahir.required' => 'Tanggal Lahir balita wajib disii',
            'tmpt_lahir.required' => 'Tempat Lahir balita wajib disii',
            'bb.required' => 'Berat badan balita wajib disii',
            'bb.numeric' => 'Berat badan balita harus ditulis angka',
            'tb.numeric' => 'Tinggi badan balita harus ditulis angka',
            'tb.required' => 'Tinggi Badan balita wajib disii',
            'nama_ortu.required' => 'Nama Orang Tua balita wajib disii',
            'no_hp_ortu.required' => 'Nomer HP Orang Tua balita wajib disii',
            'prov.required' => 'Provinsi balita wajib disii',

        ]);
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
        $tambahanData = $request->only([
            'jns_klmn',
            'alamat',
            'rt',
            'rw',
            'anak_ke'
        ]);
        $data = array_merge($validate, $tambahanData);

        $data['user_id'] = User::latest()->first()->id;
        Balita::create($data);
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
