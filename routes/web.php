<?php

use Illuminate\Support\Facades\Route;

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
    return view('balita');
});
Route::get('/dshbrd', function () {
    return view('templateNavbar');
});
