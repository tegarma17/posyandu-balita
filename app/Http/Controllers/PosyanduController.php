<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Ktkbp;
use App\Models\Posyandu;
use App\Models\Kecamatan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\ValidasiData;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Controllers\TemplateExcelController;
use App\Models\Provinsi;

class PosyanduController extends Controller
{
    private $provinsi;
    private $ktkbp;
    private $kecamatan;
    private $desa;

    protected $excelImportServices;
    public function __construct(TemplateExcelController $excelImportServices)
    {
        $this->excelImportServices = $excelImportServices;
    }
    public function initData()
    {
        $this->provinsi = Provinsi::all();
        $this->ktkbp = Ktkbp::all();
        $this->kecamatan = Kecamatan::all();
        $this->desa = Desa::all();
    }
    public function index(Request $request)
    {
        $this->initData();
        $provinsi = $this->provinsi;
        $ktkbp = $this->ktkbp;
        $kecamatan = $this->kecamatan;
        $desa = $this->desa;
        $search = $request->query('search');

        if (!empty($search)) {
            $psyndu = Posyandu::where('nama', 'like', '%' . $search . '%')
                ->orWhere('kd_psynd', 'like', '%' . $search . '%')
                ->orderBy('kd_psynd', 'asc')
                ->paginate(5)->fragment('std');
        } else {
            $psyndu = Posyandu::paginate(5)
                ->fragment('std');
        }

        $title = 'Data Posyandu';
        return view('posyandu', compact('provinsi', 'ktkbp', 'kecamatan', 'desa', 'title', 'psyndu', 'search'));
    }

    public function store(Request $request): RedirectResponse
    {

        $message = [
            'kd_psynd.unique' => 'Kode Posyandu Sudah ada',
            'nama.required' => 'Nama Posyandu Wajib diisi',
            'alamat.required' => 'Alamat Wajib diisi',
            'desa_id.required' => 'Desa Wajib Diisi'
        ];
        $validate = $request->validate([
            'kd_psynd' => ['unique:posyandu,kd_psynd'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'desa_id' => ['required'],
        ], $message);
        $validate['kd_psynd'] = Posyandu::generateKdPsynd();

        Posyandu::create($validate);
        return redirect()->route('psynd.index')->with('success', 'Posyandu Baru telah ditambahkan.');
    }
    public function import(Request $request)
    {
        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());

        $rows = $spreadsheet->getSheetByName('Posyandu')->toArray();

        foreach ($rows as $index => $row) {

            if ($index === 0) {
                continue; // Lewatkan baris pertama (header)
            }
            Log::info('Processing row: ' . json_encode($row));

            if (!empty($row[0]) && !empty($row[1]) && !empty($row[2]) && !empty($row[3])) {
                Posyandu::updateOrCreate(
                    [
                        'nama' => $row[0],
                        'alamat' => $row[1],
                        'desa_id' => $row[6],
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

    public function edit($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
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
