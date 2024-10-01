<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:user']], function () {

    Route::get('bookmark', [BookmarkController::class, 'index'])->name('bookmark');
    Route::post('/bookmark/store', [BookmarkController::class, 'store'])->name('bookmark.store');


    Route::get('download', [DownloadController::class, 'index'])->name('download');
    Route::get('/media/download/{id}', [DownloadController::class, 'download'])->name('media.download');


    Route::get('notifikasi', [NotificationController::class, 'index'])->name('notifikasi');
    Route::get('open-notifikasi/{id}', [NotificationController::class, 'readNotification'])->name('notifikasi-read');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/updateFoto/{user}', [ProfileController::class, 'updateFoto'])->name('profile.update-foto');
    Route::put('profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/changePassword/{user}', [ProfileController::class, 'changePassword'])->name('profile.gantiPassword');
});
