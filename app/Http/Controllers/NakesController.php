<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nakes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpSpreadsheet\IOFactory;

class NakesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kode = Nakes::generateNakes();
        $nakes = Nakes::whereHas('user.role', function ($query) {
            $query->where('nama_role', 'Tenaga Kesehatan');
        })->get();
        $title = 'Data Tenaga Kesehatan';
        return view('nakes', compact('nakes', 'title', 'kode'));
    }
    public function store(Request $request): RedirectResponse
    {
        $kode = Nakes::generateNakes();
        User::create([
            'role_id' => 3,
            'username' => $kode,
            'password' => bcrypt($kode),
        ]);
        $nakes = $request->all();
        $nakes['user_id'] = User::latest()->first()->id;
        Nakes::create($nakes);
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
                        'jns_klmn' => $row[2],
                        'alamat' => $row[4],
                        'no_hp' => $row[5],
                    ]
                );
            }
        }
        return redirect()->route('nakes.index')->with('success', 'Data Posyandu berhasil diimport');
    }



    public function edit(string $id)
    {
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
        return redirect()->route('nakes.index')->with('success', 'Posyandu Terhapus.');
    }
}
