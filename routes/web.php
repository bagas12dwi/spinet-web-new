<?php

use App\Http\Controllers\MediaController;
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
    return view('users.screens.dashboard.index');
})->name('home');

Route::get('/modul', function () {
    return view('users.screens.modul.index');
})->name('modul');

Route::get('/materi', function () {
    return view('users.screens.materi.index');
})->name('materi');

Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/detail-media/{medium}', [MediaController::class, 'show'])->name('detail');

Route::get('/tentang', function () {
    return view('users.screens.tentang.index');
})->name('tentang');
Route::get('/kontak', function () {
    return view('users.screens.kontak.index');
})->name('kontak');

Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::get('/register', function () {
    return view('admin.auth.register');
})->name('register');
Route::get('/404', function () {
    return view('admin.auth.404');
})->name('404');
Route::get('/reset-password', function () {
    return view('admin.auth.reset-password');
})->name('reset-password');
