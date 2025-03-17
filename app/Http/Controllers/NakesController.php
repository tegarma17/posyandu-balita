<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nakes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use PhpOffice\PhpSpreadsheet\IOFactory;

class NakesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nks = Nakes::all();
        $search = $request->query('search');
        if (!empty($search)) {
            $nakes = Nakes::where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('kd_nakes', 'like', '%' . $search . '%');
            })
                ->whereHas('user.role', function ($query) {
                    $query->where('nama_role', 'Tenaga Kesehatan');
                })
                ->orderBy('kd_nakes', 'ASC')
                ->paginate(5)->fragment('std');
        } else {
            $nakes = Nakes::whereHas('user.role', function ($query) {
                $query->where('nama_role', 'Tenaga Kesehatan');
            })
                ->paginate(5)->fragment('std');
        }

        $title = 'Data Tenaga Kesehatan';
        return view('admin.nakes.nakes', compact('nakes', 'title', 'search', 'nks'));
    }
    public function store(Request $request): RedirectResponse
    {
        $message = [
            'nik.required' => 'NIK Wajib diisi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nik.max' => 'NIK maksimal 16 angka',
            'nama.required' => 'Nama Wajib diisi',
            'alamat.required' => 'Alamat Wajib diisi',
            'no_hp.required' => 'Nomer HP wajib disii',
            'no_hp.max' => 'Nomer HP maksimal 13 angka',
            'no_hp.numeric' => 'Nomer HP harus Angka',
            'user_id.required' => 'User ID tidak boleh kosong',
            'user_id.unique' => 'User ID sudah terdaftar',

        ];
        $validate = $request->validate([
            'nik' => 'required|unique:nakes|max:16',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'user_id' => 'requried|unique:nakes'
        ], $message);
        $tambahanData = $request->only(['jns_klmn']);
        $data = array_merge($validate, $tambahanData);
        $kode = Nakes::generateNakes();
        User::create([
            'role_id' => 3,
            'username' => $kode,
            'password' => bcrypt($kode),
        ]);
        $data['user_id'] = User::latest()->first()->id;
        $data['kd_nakes'] = $kode;

        Nakes::create($data);
        return redirect()->route('nakes.index')->with('success', 'Tenaga Kesehatan Baru telah ditambahkan.');
    }

    public function import(Request $request)
    {

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $rows = $spreadsheet->getSheetByName('nakes')->toArray();

        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue;
            }

            Log::info('Processing row: ' . json_encode($row));

            if (!empty($row[0]) && !empty($row[1]) && !empty($row[2])) {
                $kode = Nakes::generateNakes();
                User::create([
                    'role_id' => 3, //Kode Tenaga Kesehatan
                    'username' => $kode,
                    'password' => bcrypt($kode)
                ]);
                Nakes::updateOrCreate(
                    [
                        'nik' => $row[0],
                    ],
                    [
                        'user_id' =>  User::latest()->first()->id,
                        'nama' => $row[1],
                        'jk' => $row[2],
                        'alamat' => $row[3],
                        'no_hp' => $row[4],
                    ]
                );
            }
        }
        return redirect()->route('nakes.index')->with('success', 'Data Posyandu berhasil diimport');
    }


    public function show($encryptedId)
    {

        $nakes = Nakes::find(Crypt::decrypt($encryptedId));
        return view('admin.nakes.show', compact('nakes'));
    }



    public function edit($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $nakes = Nakes::find($id);

        return view('editNakes', compact('nakes', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nakes = Nakes::find($id);
        $nakes->update($request->all());

        return redirect()->route('nakes.index')->with('success', 'Data Tenaga Kesehatan telah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nakes = Nakes::findOrFail($id);
        $user = User::findOrFail($nakes->user_id);
        $nakes->delete();
        $user->delete();
        return redirect()->route('nakes.index')->with('success', 'Data Tenaga Kesehatan telah Terhapus.');
    }
}
