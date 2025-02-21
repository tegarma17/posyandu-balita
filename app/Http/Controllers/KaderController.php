<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kader;
use App\Models\Nakes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $kode = Kader::generateKader();
        $title = 'Data Kader';
        if (!empty($search)) {
            $kaders = Kader::where('nama', 'like', '%' . $search . '%')
                ->orWhere('kd_nakes', 'like', '%' . $search . '%')
                ->orderBy('kd_nakes', 'ASC')
                ->whereHas('user.role', function ($query) {
                    $query->where('nama_role', 'Kader Posyandu');
                })
                ->paginate(5)->fragment('std');
        } else {
            $kaders = Kader::whereHas('user.role', function ($query) {
                $query->where('nama_role', 'Kader Posyandu');
            })->paginate(5)->fragment('std');
        }
        return view('kader', compact('kaders', 'kode', 'search', 'title'));
    }


    public function store(Request $request)
    {
        $kode = Kader::generateKader();

        User::create([
            'role_id' => 2, //Kode Kader pada database
            'username' => $kode,
            'password' => bcrypt($kode),
        ]);
        $nakes = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kd_nakes' => $kode,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'user_id' => USer::latest()->first()->id,
        ];

        Kader::create($nakes);
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
                $kode = Kader::generateKader();
                User::create([
                    'role_id' => 2,
                    'username' => $kode,
                    'password' => bcrypt($kode)
                ]);
                Kader::updateOrCreate(
                    [
                        'nik' => $row[0],
                    ],
                    [
                        'user_id' =>  User::latest()->first()->id,
                        'nama' => $row[1],
                        'jns_klmn' => $row[2],
                        'alamat' => $row[3],
                        'no_hp' => $row[4],
                    ]
                );
            }
        }

        return redirect()->route('kader.index')->with('success', 'Data Kader berhasil diimport');
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
