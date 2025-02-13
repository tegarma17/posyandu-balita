<?php

use App\Http\Controllers\BalitaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;
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

Route::GET('/data-tenaga-kesehatan', [NakesController::class, 'index'])->name('nakes.index');
Route::POST('/data-tenaga-kesehatan', [NakesController::class, 'store'])->name('nakes.simpan');
Route::DELETE('/data-tenaga-kesehatan/delete/{id}', [NakesController::class, 'destroy'])->name('nakes.destroy');
Route::GET('/data-tenaga-kesehatan/edit/{id}', [NakesController::class, 'edit'])->name('nakes.edit');
Route::PUT('/data-tenaga-kesehatan/update/{id}', [NakesController::class, 'update'])->name('nakes.update');

Route::GET("/data-posyandu", [PosyanduController::class, 'index'])->name('psynd.index');
route::GET('/posyandu-balita/edit/{id}', [PosyanduController::class, 'edit'])->name('psynd.edit');
Route::POST('posyandu', [PosyanduController::class, 'store'])->name('psynd.simpan');
Route::DELETE('/posyandu/delete/{id}', [PosyanduController::class, 'destroy'])->name('psynd.destroy');
Route::PUT('/posyandu/edit/{id}', [PosyanduController::class, 'update'])->name('psynd.update');
Route::GET('/desa/by-kecamatan/{id}', [KecamatanController::class, 'GETByKecamatan']);
Route::GET('/desa/by-kecamatan/{id}', [DesaController::class, 'GETByKecamatan']);
Route::GET('/generate-template-excel-posyandu', [TemplateExcelController::class, 'generatePosyandu']);
Route::POST('/import-data-posyandu', [PosyanduController::class, 'import'])->name('import.posyandu');
Route::GET('/donload-template-posyandu', function () {
    $file = public_path() . "/template/data_posyandu.xlsx";
    return response()->download($file, 'data_posyandu.xlsx');
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
