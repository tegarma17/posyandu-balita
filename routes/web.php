<?php

use App\Http\Controllers\BalitaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\NakesController;
use App\Http\Controllers\TemplateExcelController;

Route::GET('/', function () {
    return view('welcome');
});

Route::GET('/login', function () {
    return view('login');
});

Route::GET('/test', function () {
    return view('dashboard');
});

Route::GET('/profile', function () {
    return view('profile', ['profile' => 'Profile']);
});

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

Route::GET('/dta_jdl', function () {
    return view('jadwal', ['jdwl' => 'Jadwal Posyandu']);
});

Route::GET('/dta-vip-blt', function () {
    return view('vipBalita', ['title' => 'Data Vakin Imunisasi dan Penimbangan']);
});

Route::GET('/dta-laporan', function () {
    return view('laporan', ['title' => 'Data Laporan Posyandu']);
});
Route::GET('/dshbrd', function () {
    return view('templateNavbar');
});
