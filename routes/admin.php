<?php

use App\Http\Controllers\Admin\DiscussionController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\KitController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ModulController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebSettingController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');

    Route::resource('/modul', ModulController::class)->names('modul');
    Route::resource('/media', MediaController::class)->names('media');
    Route::resource('/tim', TeamController::class)->names('tim');
    Route::resource('/setting', WebSettingController::class)->names('setting');
    Route::resource('/faq', QuestionController::class)->names('faq');
    Route::resource('/diskusi', DiscussionController::class)->names('diskusi');
    Route::resource('/pengguna', UserController::class)->names('pengguna');
    Route::resource('/feedback', FeedbackController::class)->names('feedback');
    Route::resource('/kit', KitController::class)->names('kit');
    Route::post('/feedback/toggle/{id}', [FeedbackController::class, 'toggleVisibility'])->name('feedback.toggle');


    Route::get('/account', function () {
        return view('admin.pages.account');
    })->name('account');
});
