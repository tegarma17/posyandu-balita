<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\KecamatanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/test', function () {
    return view('dashboard');
});

Route::get('/profile', function () {
    return view('profile', ['profile' => 'Profile']);
});

Route::get('/dta_blt', function () {
    return view('balita', ['blt' => 'Data Balita']);
});
Route::get('/tmbdta_blt', function () {
    return view('tambahdtBalita', ['blt' => 'Tambah Data Balita']);
});
Route::get('/edt-blt', function () {
    return view('editBalita', ['' => '']);
});

Route::get('/dta_nks', function () {
    return view('nakes', ['nks' => 'Data Tenaga Kesehatan']);
});

route::get("/psyndu", [PosyanduController::class, 'index'])->name('psynd.index');
Route::get('/desa/by-kecamatan/{id}', [KecamatanController::class, 'getByKecamatan']);
Route::get('/desa/by-kecamatan/{id}', [DesaController::class, 'getByKecamatan']);



Route::get('/dta_jdl', function () {
    return view('jadwal', ['jdwl' => 'Jadwal Posyandu']);
});

Route::get('/dta-vip-blt', function () {
    return view('vipBalita', ['title' => 'Data Vakin Imunisasi dan Penimbangan']);
});

Route::get('/dta-laporan', function () {
    return view('laporan', ['title' => 'Data Laporan Posyandu']);
});
Route::get('/dshbrd', function () {
    return view('templateNavbar');
});
