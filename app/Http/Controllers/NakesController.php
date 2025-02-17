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
        $nakes = Nakes::with('user.role')->get();
        $title = 'Data Tenaga Kesehatan';
        return view('nakes', compact('nakes', 'title'));
    }
    public function store(Request $request): RedirectResponse
    {
        User::create([
            'role_id' => $request->role_id,
            'username' => $request->kd_nakes,
            'password' => $request->kd_nakes,
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
        $rows = $spreadsheet->getSheetByName('Sheet1')->toArray();

        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue;
            }

            Log::info('Processing row: ' . json_encode($row));

            if (!empty($row[0]) && !empty($row[1]) && !empty($row[2])) {

                User::create([
                    'role_id' => $row[4],
                    'username' => $row[1],
                    'password' => $row[1],
                ]);
                Nakes::updateOrCreate(
                    [
                        'nik' => $row[0],
                    ],
                    [
                        'user_id' =>  User::latest()->first()->id,
                        'kd_nakes' => $row[1],
                        'nama' => $row[2],
                        'jns_klmn' => $row[3],
                        'alamat' => $row[5],
                        'no_hp' => $row[6],
                    ]
                );
            }
        }
        return redirect()->route('nakes.index')->with('success', 'Data Posyandu berhasil diimport');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
        $nakes->delete();
        return redirect()->route('nakes.index')->with('success', 'Posyandu Terhapus.');
    }
}
