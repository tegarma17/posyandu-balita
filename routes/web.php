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
    Route::prefix('/data-balita')->group(function () {
        Route::GET('/', [BalitaController::class, 'index'])->name('balita.index');
        Route::GET('/tambah', [BalitaController::class, 'create'])->name(('tambah.balita'));
        Route::POST('/simpan', [BalitaController::class, 'store'])->name('balita.simpan');
        Route::GET('/edit/{nama_balita}/{id}', [BalitaController::class, 'edit'])->name('balita.edit');
        Route::PUT('/update-data/{id}', [BalitaController::class, 'update'])->name('balita.update');
        Route::DELETE('/delete/{id}', [BalitaController::class, 'destroy'])->name('balita.delete');
        ROUTE::POST('/import-data-balita', [BalitaController::class, 'import'])->name('import.balita');
        Route::GET('/donload-template-balita', function () {
            $file = public_path() . "/template/template balita.xlsx";
            return response()->download($file, 'template balita.xlsx');
        })->name('download.template.balita');
    });
    Route::prefix('/data-tenaga-kesehatan')->group(function () {
        Route::GET('/', [NakesController::class, 'index'])->name('nakes.index');
        Route::POST('/save', [NakesController::class, 'store'])->name('nakes.simpan');
        Route::DELETE('/delete/{id}', [NakesController::class, 'destroy'])->name('nakes.destroy');
        Route::GET('/edit/{id}', [NakesController::class, 'edit'])->name('nakes.edit');
        Route::PUT('/update/{id}', [NakesController::class, 'update'])->name('nakes.update');
        Route::GET('/generate-template-excel-nakes', [TemplateExcelController::class, 'generetaNakes'])->name('template.nakes');
        Route::POST('/import-data-nakes', [NakesController::class, 'import'])->name('import.nakes');
    });
    Route::prefix('/data-kader')->group(function () {
        Route::GET('/', [KaderController::class, 'index'])->name('kader.index');
        Route::POST('/simpan', [KaderController::class, 'store'])->name('kader.simpan');
        Route::GET('/generate-template-kader-excel', [TemplateExcelController::class, 'generateKader'])->name('template.kader');
        Route::POST('/import-data-kader', [KaderController::class, 'import'])->name('import.kader');
        Route::GET('/edit/{id}', [KaderController::class, 'edit'])->name('kader.edit');
        Route::PUT('/update/{id}', [KaderController::class, 'update'])->name('kader.ubah');
        Route::DELETE('/delete/{id}', [KaderController::class, 'destroy'])->name('kader.destroy');
    });
    Route::prefix('/data-posyandu')->group(function () {
        Route::GET('/', [PosyanduController::class, 'index'])->name('psynd.index');
        route::GET('/edit/{id}', [PosyanduController::class, 'edit'])->name('psynd.edit');
        Route::POST('/simpan', [PosyanduController::class, 'store'])->name('psynd.simpan');
        Route::DELETE('/delete/{id}', [PosyanduController::class, 'destroy'])->name('psynd.destroy');
        Route::PUT('/edit/{id}', [PosyanduController::class, 'update'])->name('psynd.update');
        Route::GET('/generate-template-excel-posyandu', [TemplateExcelController::class, 'generatePosyandu']);
        Route::POST('/import-data-posyandu', [PosyanduController::class, 'import'])->name('import.posyandu');
        Route::GET('/donload-template-posyandu', function () {
            $file = public_path() . "/template/template posyandu.xlsx";
            return response()->download($file, 'template posyandu.xlsx');
        })->name('download.template.posyandu');
    });
    Route::prefix('/jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'index'])->name('jadwal.index');
        Route::get('/edit-jadwal/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
        Route::get('/detail-jadwal/{id}', [JadwalController::class, 'detailJadwal'])->name('jadwal.detailAdmin');
        Route::get('/detail-petugas/{jadwal_posyandu}/{id_psynd}', [JadwalController::class, 'detailPetugas'])->name('jadwal.detailPetugas');
        Route::put('/update-jadwal/', [JadwalController::class, 'updateByJadwal'])->name('jadwal.update');
        Route::put('/edit-jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.ubah');
        Route::post('/simpan', [JadwalController::class, 'store'])->name('jadwal.tambah');
        Route::delete('/hapus/{id}', [JadwalController::class, 'destroy'])->name('jadwal.delete');
    });
});

Route::group(['middleware' => ['auth', 'check_role:2,3']], function () {

    Route::GET('/jadwal-posyandu/detail/{id}', [JadwalController::class, 'show'])->name('jadwal.detail');
    Route::get('/jadwal-posyandu', [JadwalController::class, 'showNksKdr'])->name('jadwal.nakes');

    Route::prefix('/penimbangan-balita')->group(function () {
        Route::get('/', [PenimbanganController::class, 'index'])->name('penimbangan.index');
        Route::get('/detail-penimbangan', [PenimbanganController::class, 'showConfirmation'])->name('penimbangan.detailMeasurement');
        Route::get('/{baby_name}/{id}', [PenimbanganController::class, 'create'])->name('vip.penimbangan');
        Route::post('/detail-penimbangan-balita', [PenimbanganController::class, 'storeDetail'])->name('vip.simpan_penimbangan');
        Route::post('save-penimbangan', [PenimbanganController::class, 'saveInformation'])->name('vip.savePenimbangan');
        Route::GET('/rekap/{id}', [PenimbanganController::class, 'show'])->name('vip.rekap_penimbangan');
        Route::PUT('/edit-penimbangan/{id}', [PenimbanganController::class, 'update'])->name('vip.edit_penimbangan');
    });

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
