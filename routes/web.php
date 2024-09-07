<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('users.screens.dashboard.index');
});

Route::get('/modul', function () {
    return view('users.screens.modul.index');
})->name('modul');

Route::get('/materi', function () {
    return view('users.screens.materi.index');
})->name('materi');
Route::get('/media', function () {
    return view('users.screens.media.index');
})->name('media');
Route::get('/tentang', function () {
    return view('users.screens.tentang.index');
})->name('tentang');
Route::get('/kontak', function () {
    return view('users.screens.kontak.index');
})->name('kontak');
