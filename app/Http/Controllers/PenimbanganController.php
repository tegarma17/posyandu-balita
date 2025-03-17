<?php

namespace App\Http\Controllers;

use PDO;
use DateTime;
use App\Models\Nakes;
use App\Models\WhoBB;
use App\Models\WhoTB;
use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Antrian;
use App\Models\Pengukuran;
use App\Models\Penimbangan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PenimbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $userID;
    private $NakesID;
    private $jadwalPosyandu;
    private $balita;
    private $tanggal;
    private $jadwal;

    public function initData()
    {

        $this->userID = Auth::user()->id;
        $this->NakesID = Nakes::where('user_id', $this->userID)->first();
        $this->jadwalPosyandu = Jadwal::where('id_nakes', $this->NakesID->id)->orderBy('selesai_posyandu', 'desc')->first();
        $this->balita = Balita::all();
        $this->tanggal = now()->format('m-d');
        $this->jadwal =  date('m-d', strtotime($this->jadwalPosyandu->selesai_posyandu));
    }
    public function index()
    {
        $this->initData();
        $title = 'Data Penimbangan Balita';
        $user = $this->userID;
        $balita = $this->balita;
        $tanggal = $this->jadwal;
        $cek = $this->tanggal;

        return view('vip.penimbangan', compact('title', 'balita',  'cek', 'tanggal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($baby_name, $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $this->initData();
        $balita = $this->balita;
        $jadwalPosyandu = $this->jadwalPosyandu;
        $balita = Balita::where('id', $id)->first();
        if (Str::slug($balita->nama) !== $baby_name) {
            abort(404, 'Nama balita tidak sesuai.');
        }

        if ($balita == null) {
            return redirect()->route('penimbangan.index')->with('success', 'Data balita tidak ada.');
        }
        $edit = Penimbangan::where('id_balita', $id)->first();
        $editTB = Pengukuran::where('id_balita', $id)->first();

        $jadwal = $this->jadwal;
        if ($edit == null) {
            $usia = Balita::getBabyAge($id);
            $rekap = Penimbangan::where('id_balita', $id)->get();
        }

        if ($this->tanggal <= $this->tanggal && $edit !== null) {
            $usia = Balita::getBabyAge($id);
            $rekap = Balita::HealthWeight($id);
        }

        return view('vip.tambahPenimbangan', compact('jadwalPosyandu', 'usia', 'rekap', 'balita', 'edit', 'jadwal', 'editTB'));

        if ($edit->tanggal_penimbangan !== $this->tanggal) {
            return redirect()->route('penimbangan.index')->with('error', 'Halaman tidak dapat diakses silahkan hubungi admin terkait.');
        }
    }

    public function storeDetail(Request $request)
    {

        $idJadwal = $request->input('id_jadwal');
        $idBalita = $request->input('id_balita');
        $usia = $request->input('usia');
        $bb = $request->input('berat_badan');
        $tb = $request->input('tinggi_badan');
        $whobb = WhoBB::where('usia', $usia)->first();
        $whotb = WhoTB::where('usia', $usia)->first();

        // z-score berat badan
        $z_score = ($bb - $whobb->mean_bb) / $whobb->std_dev;
        if ($z_score < -3) {
            $status_bb = 'Gizi Buruk';
        } elseif ($z_score >= -3 && $z_score < -2) {
            $status_bb = 'Gizi Kurang';
        } elseif ($z_score >= -2 && $z_score <= 2) {
            $status_bb = 'Gizi Baik';
        } else {
            $status_bb = 'Gizi Lebih';
        }
        if ($whobb->mean_bb < $bb) {
            $keterangan = 'T';
        } elseif ($whobb->mean_bb >= $bb) {
            $keterangan = 'N';
        } else {
            $keterangan = 'B';
        }
        // z-score tinggi badan
        $z_score = ($tb - $whobb->mean_tb) / $whotb->std_dev;
        if ($z_score < -3) {
            $status_tb = 'Sangat Pendek';
        } elseif ($z_score >= -3 && $z_score < -2) {
            $status_tb = 'Pendek';
        } elseif ($z_score >= -2 && $z_score <= 2) {
            $status_tb = 'Normal';
        } else {
            $status_tb = 'Tinggi';
        }
        $tb = [
            'id_jadwal' => $idJadwal,
            'id_balita' => $idBalita,
            'tinggi_badan' => $tb,
            'tanggal_pengukuran' => $request->tgl_penimbangan,
            'jenis_pengukuran' => $request->jenis_pengukuran,
            'status_gizi' => $status_tb,
            'usia' => $usia,
            'saran' => $request->saran,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $bb = [
            'id_jadwal' => $idJadwal,
            'id_balita' => $idBalita,
            'berat_badan' => $bb,
            'tanggal_penimbangan' => $request->tgl_penimbangan,
            'status_gizi' => $status_bb,
            'keterangan' => $request->keterangan,
            'usia' => $usia,
            'saran' => $request->saran,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        session(['input_bb' => $bb, 'input_tb' => $tb]);
        return redirect()->route('penimbangan.detailMeasurement');
    }
    public function showConfirmation()
    {

        $inputBb = session('input_bb', []);
        $inputTb = session('input_tb', []);
        $id_balita = $inputBb['id_balita'];

        $balita = Balita::where('id', $id_balita)->first();
        $prevWeight = Penimbangan::where('id_balita', $inputTb['id_balita'])->orderBy('tanggal_penimbangan', 'desc')->first();
        $prevHeight = Pengukuran::where('id_balita', $inputBb['id_balita'])->orderBy('tanggal_pengukuran', 'desc')->first();
        if (!$prevWeight) {
            $prevWeightMessage = 'Belum Ada Data';
        } else {
            $prevWeightMessage = $prevWeight->berat_badan . ' Kg';
        }
        if (!$prevHeight) {
            $prevHeightMessage = 'Belum Ada Data';
        } else {
            $prevHeightMessage = $prevHeight->tinggi_badan . 'cm';
        }

        if (empty($inputBb) || empty($inputTb)) {
            return redirect()->back()->with('error', 'Data tidak ditemukan! Harap isi ulang form.');
        }
        return view('confirmationMeasurement', compact('inputBb', 'inputTb', 'balita', 'prevWeightMessage', 'prevHeightMessage'));
    }
    public function saveInformation()
    {
        $inputBb = session('input_bb', []);
        $inputTb = session('input_tb', []);
        if (empty($inputBb) || empty($inputTb)) {
            return redirect()->back()->with('error', 'Data tidak ditemukan! Harap isi ulang form.');
        }
        Pengukuran::create([
            'id_jadwal' => $inputTb['id_jadwal'],
            'id_balita' => $inputTb['id_balita'],
            'tinggi_badan' => $inputTb['tinggi_badan'],
            'tanggal_pengukuran' => $inputTb['tanggal_pengukuran'],
            'status_gizi' => $inputTb['status_gizi'],
            'usia' => $inputTb['usia'],
            'saran' => $inputTb['saran'],
            'created_at' => $inputTb['created_at'],
            'updated_at' => $inputTb['updated_at'],
        ]);
        Penimbangan::create([
            'id_jadwal' => $inputBb['id_jadwal'],
            'id_balita' => $inputBb['id_balita'],
            'berat_badan' => $inputBb['berat_badan'],
            'tanggal_penimbangan' => $inputBb['tanggal_penimbangan'],
            'keterangan' => $inputBb['keterangan'],
            'status_gizi' => $inputBb['status_gizi'],
            'usia' => $inputBb['usia'],
            'saran' => $inputBb['saran'],
            'created_at' => $inputBb['created_at'],
            'updated_at' => $inputBb['updated_at'],
        ]);
        session()->forget('inputBb', 'inputTb');
        return redirect()->route('penimbangan.index')->with('success', 'Transaksi berhasil disimpan.');
    }


    public function show(string $id)
    {
        $rekap = Penimbangan::where('id_balita', $id);
        return view('vip.rekappenimbangan', compact('rekap'));
    }

    public function update(Request $request, string $id)
    {
        $penimbangan = Penimbangan::find($id);
        $usia = $request->input('usia');
        $bb = $request->input('berat_badan');
        $idBalita = $request->input('id_balita');

        $whobb = WhoBB::where('usia', $usia)->first();
        $z_score = ($bb - $whobb->mean_bb) / $whobb->std_dev;
        if ($z_score < -3) {
            $status_bb = 'Gizi Buruk';
        } elseif ($z_score >= -3 && $z_score < -2) {
            $status_bb = 'Gizi Kurang';
        } elseif ($z_score >= -2 && $z_score <= 2) {
            $status_bb = 'Gizi Baik';
        } else {
            $status_bb = 'Gizi Lebih';
        }
        $data = [
            'berat_badan' => $bb,
            'tanggal_penimbangan' => $request->tgl_penimbangan,
            'keterangan' => $request->keterangan,
            'status_gizi' => $status_bb,
            'usia' => $usia,
            'saran' => $request->saran,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $penimbangan->update($data);
        return redirect()->route('vip.penimbangan', $idBalita)->with('succes', 'Data Penimbangan balita telah diupdate');
    }
}
