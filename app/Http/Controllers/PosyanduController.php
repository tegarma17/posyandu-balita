<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Ktkbp;
use App\Models\Posyandu;
use App\Models\Kecamatan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Controllers\TemplateExcelController;

class PosyanduController extends Controller
{
    protected $excelImportServices;
    public function __construct(TemplateExcelController $excelImportServices)
    {
        $this->excelImportServices = $excelImportServices;
    }
    public function index()
    {
        $ktkbp = Ktkbp::all();
        $kcmtn = Kecamatan::all();
        $desa = Desa::all();
        $psyndu = Posyandu::with('desa')->get();
        $title = 'Data Posyandu';
        return view('posyandu', compact('ktkbp', 'kcmtn', 'desa', 'title', 'psyndu'));
    }

    public function store(Request $request): RedirectResponse
    {
        Posyandu::create($request->all());
        return redirect()->route('psynd.index')->with('success', 'Posyandu Baru telah ditambahkan.');
    }
    public function import(Request $request)
    {
        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());

        $rows = $spreadsheet->getSheetByName('Sheet1')->toArray();

        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue; // Lewatkan baris pertama (header)
            }
            Log::info('Processing row: ' . json_encode($row));

            if (!empty($row[0]) && !empty($row[1]) && !empty($row[2]) && !empty($row[3])) {
                Posyandu::updateOrCreate(
                    [
                        'kd_psynd' => $row[0]
                    ],
                    [
                        'nm_psynd' => $row[1],
                        'alamat' => $row[2],
                        'prov' => $row[4],
                        'kd_ktkbp' => $row[6],
                        'kd_kcmtn' => $row[8],
                        'kd_desa' => $row[10],
                    ]
                );
            }
        }
        return redirect()->route('psynd.index')->with('success', 'Data Posyandu berhasil diimport');
    }
    public function destroy($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        $posyandu->delete();
        return redirect()->route('psynd.index')->with('success', 'Posyandu Terhapus.');
    }

    public function edit(string $id): View
    {
        $posyandu = Posyandu::find($id);
        $kecamatan = Kecamatan::all();
        $desa = Desa::where('kcmtn_id', $posyandu->kecamatan_id)->get();
        return view('editPosyandu', compact('posyandu', 'kecamatan', 'desa', 'id'));
    }


    public function update(Request $request, $id)
    {
        $posyandu = Posyandu::find($id);
        $posyandu->update($request->all());
        return redirect()->route('psynd.index')->with('success', 'Data Posyandu telah dirubah');
    }
}
