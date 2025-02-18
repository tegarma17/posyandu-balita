<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nakes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kaders = Nakes::whereHas('user.role', function ($query) {
            $query->where('nama_role', 'Kader Posyandu');
        })->get();
        return view('kader', ['title' => 'Data Kader'], compact('kaders'));
    }


    public function store(Request $request)
    {
        $kode = Nakes::generateKader();


        User::create([
            'role_id' => 2, //Kode Kader pada database
            'username' => $kode,
            'password' => bcrypt($kode),

        ]);
        $nakes = $request->all();
        $nakes['user_id'] = User::latest()->first()->id;
        Nakes::create($nakes);
        return redirect()->route('kader.index')->with('success', 'Tenaga Kesehatan Baru telah ditambahkan.');
    }

    public function import(Request $request)
    {

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $rows = $spreadsheet->getSheetByName('kader')->toArray();

        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue;
            }

            Log::info('Processing row: ' . json_encode($row));

            if (!empty($row[0]) && !empty($row[1]) && !empty($row[2])) {
                $kode = Nakes::generateKader();
                User::create([
                    'role_id' => $row[3],
                    'username' => $kode,
                    'password' => $kode,
                ]);
                Nakes::updateOrCreate(
                    [
                        'nik' => $row[0],
                    ],
                    [
                        'user_id' =>  User::latest()->first()->id,
                        'nama' => $row[1],
                        'jns_klmn' => $row[2],
                        'alamat' => $row[4],
                        'no_hp' => $row[5],
                    ]
                );
            }
        }
        return redirect()->route('kader.index')->with('success', 'Data Posyandu berhasil diimport');
    }
    public function edit(string $id)
    {
        $kader = Nakes::find($id);
        return view('editKader', compact('kader', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kader = Nakes::findOrFail($id);
        $kader->update($request->all());
        return redirect()->route('kader.index')->with('success', 'Data Kader Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kader = Nakes::findOrFail($id);
        $user = User::findOrFail($kader->user_id);
        $user->delete();
        $kader->delete();
        return redirect()->route('kader.index')->with('success', 'Data Kader Terhapus.');
    }
}
