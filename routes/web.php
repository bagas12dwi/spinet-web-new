<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Google\AuthController as GoogleAuthController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LikeCommentDiscussionController;
use App\Http\Controllers\LikeCommentMediaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ModulController;
use App\Models\LikeCommentMedia;
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
Route::group(['middleware' => ['auth', 'role:user']], function () {

    Route::get('/detail-media/{medium}', [MediaController::class, 'show'])->name('detail');
    Route::post('/media/{mediaId}/comment', [MediaController::class, 'storeComment'])->name('mediaComment.store');
    Route::post('/media/comment/{commentId}/reply', [MediaController::class, 'storeReply'])->name('mediaComment.reply');
    Route::post('/media/{comment}/like', [LikeCommentMediaController::class, 'likeComment'])->name('media.like');
    Route::post('/kontak/feedback', [KontakController::class, 'sendMail'])->name('feedback');
    Route::post('/diskusi/{discussion}/comment', [KontakController::class, 'storeComment'])->name('diskusiComment.store');
    Route::post('/diskusi/comment/{comment}/reply', [KontakController::class, 'storeReply'])->name('diskusiComment.reply');
    Route::post('/diskusi/{comment}/like', [LikeCommentDiscussionController::class, 'likeComment'])->name('diskusi.like');
});

Route::get('/tentang', [AboutController::class, 'index'])->name('tentang');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');



Route::get('/login', function () {
    return view('admin.auth.login', [
        'title' => 'Auth'
    ]);
})->name('login');
Route::get('/register', function () {
    return view('admin.auth.register', [
        'title' => 'Auth'
    ]);
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('postRegister');
Route::post('/login', [AuthController::class, 'login'])->name('postLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/{provider}', [GoogleAuthController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [GoogleAuthController::class, 'handleProvideCallback']);

Route::get('/404', function () {
    return view('admin.auth.404');
})->name('404');
Route::get('/reset-password', function () {
    return view('admin.auth.reset-password');
})->name('reset-password');
