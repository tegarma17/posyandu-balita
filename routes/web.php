<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VipController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\NakesController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\TemplateExcelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VakimunController;
use App\Models\Vakimun;

Route::GET('/', function () {
    return view('welcome');
});



Route::group(['middleware' => ['auth', 'nocache', 'ensure_auth']], function () {
    Route::GET('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::GET('/data-balita', [BalitaController::class, 'index'])->name('balita.index');
    Route::GET('/data-balita/tambah', [BalitaController::class, 'create'])->name(('tambah.balita'));
});

Route::get('/login', [SesiController::class, 'index'])->name('login.index');
Route::post('/login', [SesiController::class, 'login'])->name('login.masuk');
Route::get('/logout', [SesiController::class, 'logout'])->name('sesi.logout');

Route::group(['middleware' => ['auth', 'check_role:1,2,3,4']], function () {
    Route::GET('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

Route::group(['middleware' => ['auth', 'check_role:1']], function () {
    Route::get('/data-user', [UserController::class, 'index'])->name('user');

    Route::GET('/data-balita', [BalitaController::class, 'index'])->name('balita.index');
    Route::GET('/data-balita/tambah', [BalitaController::class, 'create'])->name(('tambah.balita'));
    Route::POST('/data-balita', [BalitaController::class, 'store'])->name('balita.simpan');
    Route::GET('/data-balita/edit/{id}', [BalitaController::class, 'edit'])->name('balita.edit');
    Route::PUT('/data-balita/update-data/{id}', [BalitaController::class, 'update'])->name('balita.update');
    Route::DELETE('/data-balita/delete/{id}', [BalitaController::class, 'destroy'])->name('balita.delete');
    ROUTE::POST('/import-data-balita', [BalitaController::class, 'import'])->name('import.balita');
    Route::GET('/donload-template-balita', function () {
        $file = public_path() . "/template/template balita.xlsx";
        return response()->download($file, 'template balita.xlsx');
    })->name('download.template.balita');

    Route::GET('/data-tenaga-kesehatan', [NakesController::class, 'index'])->name('nakes.index');
    Route::POST('/data-tenaga-kesehatan', [NakesController::class, 'store'])->name('nakes.simpan');
    Route::DELETE('/data-tenaga-kesehatan/delete/{id}', [NakesController::class, 'destroy'])->name('nakes.destroy');
    Route::GET('/data-tenaga-kesehatan/edit/{id}', [NakesController::class, 'edit'])->name('nakes.edit');
    Route::PUT('/data-tenaga-kesehatan/update/{id}', [NakesController::class, 'update'])->name('nakes.update');
    Route::GET('/generate-template-excel-nakes', [TemplateExcelController::class, 'generetaNakes'])->name('template.nakes');
    Route::POST('/import-data-nakes', [NakesController::class, 'import'])->name('import.nakes');

    Route::GET('/data-kader', [KaderController::class, 'index'])->name('kader.index');
    Route::POST('/data-kader', [KaderController::class, 'store'])->name('kader.simpan');
    Route::GET('/generate-template-kader-excel', [TemplateExcelController::class, 'generateKader'])->name('template.kader');
    Route::POST('/import-data-kader', [KaderController::class, 'import'])->name('import.kader');
    Route::GET('/data-kader/edit/{id}', [KaderController::class, 'edit'])->name('kader.edit');
    Route::PUT('/data-kader/update/{id}', [KaderController::class, 'update'])->name('kader.ubah');
    Route::DELETE('/data-kader/delete/{id}', [KaderController::class, 'destroy'])->name('kader.destroy');

    Route::GET('/data-posyandu', [PosyanduController::class, 'index'])->name('psynd.index');
    route::GET('/posyandu-balita/edit/{id}', [PosyanduController::class, 'edit'])->name('psynd.edit');
    Route::POST('posyandu', [PosyanduController::class, 'store'])->name('psynd.simpan');
    Route::DELETE('/posyandu/delete/{id}', [PosyanduController::class, 'destroy'])->name('psynd.destroy');
    Route::PUT('/posyandu/edit/{id}', [PosyanduController::class, 'update'])->name('psynd.update');
    Route::GET('/desa/by-kecamatan/{id}', [KecamatanController::class, 'GETByKecamatan']);
    Route::GET('/desa/by-kecamatan/{id}', [DesaController::class, 'GETByKecamatan']);
    Route::GET('/generate-template-excel-posyandu', [TemplateExcelController::class, 'generatePosyandu']);
    Route::POST('/import-data-posyandu', [PosyanduController::class, 'import'])->name('import.posyandu');
    Route::GET('/donload-template-posyandu', function () {
        $file = public_path() . "/template/template posyandu.xlsx";
        return response()->download($file, 'template posyandu.xlsx');
    })->name('download.template.posyandu');

    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal-posyandu/edit-jadwal/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal-posyandu/edit-jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.ubah');
    Route::post('/jadwal-posyandu/simpan', [JadwalController::class, 'store'])->name('jadwal.tambah');
    Route::delete('/jadwal-posyandu/hapus/{id}', [JadwalController::class, 'destroy'])->name('jadwal.delete');
});

Route::group(['middleware' => ['auth', 'check_role:2,3']], function () {

    Route::GET('/jadwal-posyandu/detail/{id}', [JadwalController::class, 'show'])->name('jadwal.detail');
    Route::get('/jadwal-posyandu', [JadwalController::class, 'showNksKdr'])->name('jadwal.nakes');

    Route::get('/penimbangan-balita', [PenimbanganController::class, 'index'])->name('penimbangan.index');
    Route::get('/penimbangan-balita/{id}', [PenimbanganController::class, 'create'])->name('vip.penimbangan');
    Route::post('/penimbangan-balita/penimbangan', [PenimbanganController::class, 'store'])->name('vip.simpan_penimbangan');
    Route::GET('/penimbangan-balita/rekap/{id}', [PenimbanganController::class, 'show'])->name('vip.rekap_penimbangan');
    Route::PUT('/penimbangan-balita/ubah/{id}', [PenimbanganController::class, 'update'])->name('vip.edit_penimbangan');

    Route::get('/vakimun-balita', [VakimunController::class, 'index'])->name('vakimun.index');
    Route::get('/vakimun-balita/{id}', [VakimunController::class, 'create'])->name('vip.vakimun');
    Route::post('/vakimun-balita/simpan', [VakimunController::class, 'store'])->name('vip.simpan_vakimun');

    Route::GET('/dta-laporan', function () {
        return view('laporan', ['title' => 'Data Laporan Posyandu']);
    });
});

Route::group(['middleware' => ['auth', 'check_role:4']], function () {
    Route::get('/jadwal-posyandu-balita', [JadwalController::class, 'showJadwal'])->name('jadwal.balita');
    Route::get('/jadwal-posyandu-balita/antrian{id}', [JadwalController::class, 'ambilAntri'])->name('jadwal.antrian');
});
