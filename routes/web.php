<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ModulController;
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

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/modul', [ModulController::class, 'index'])->name('modul');

Route::get('/materi', [MateriController::class, 'index'])->name('materi');

Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/detail-media/{medium}', [MediaController::class, 'show'])->name('detail');

Route::get('/tentang', [AboutController::class, 'index'])->name('tentang');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::get('/register', function () {
    return view('admin.auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('postRegister');
Route::post('/login', [AuthController::class, 'login'])->name('postLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/404', function () {
    return view('admin.auth.404');
})->name('404');
Route::get('/reset-password', function () {
    return view('admin.auth.reset-password');
})->name('reset-password');
