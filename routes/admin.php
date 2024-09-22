<?php

use App\Http\Controllers\Admin\MediaController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

Route::resource('/media', MediaController::class)->names('media');
Route::get('/docs', function () {
    return view('admin.pages.docs');
})->name('docs');
Route::get('/orders', function () {
    return view('admin.pages.orders');
})->name('orders');
Route::get('/notification', function () {
    return view('admin.pages.notification');
})->name('notification');
Route::get('/account', function () {
    return view('admin.pages.account');
})->name('account');
Route::get('/setting', function () {
    return view('admin.pages.setting');
})->name('setting');
Route::get('/chart', function () {
    return view('admin.pages.chart');
})->name('chart');
Route::get('/help', function () {
    return view('admin.pages.help');
})->name('help');
