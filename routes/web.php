<?php

use App\Http\Controllers\googlemapsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\postListController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [googlemapsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    //プロフィールの表示
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    //プロフィールの編集
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings', [SettingsController::class, 'settings'])->name('profile.settings');
    
    //投稿画面の表示
    Route::get('/googlemapsForm', [googlemapsController::class, 'googlemapsForm'])->name('googlemaps.postForm');
    Route::post('/googlemapsForm', [googlemapsController::class, 'spotStore'])->name('SpotStore');
    
    //投稿詳細の表示
    Route::get('/show/{spotPost}', [googlemapsController::class, 'show'])->name('googlemaps.show');
    
    //編集画面・更新処理（追加）
    Route::get('/show/{spotPost}/edit', [googlemapsController::class, 'edit'])->name('spotPost.edit');
    Route::patch('/show/{spotPost}', [googlemapsController::class, 'update'])->name('spotPost.update');
    Route::delete('/show/{spotPost}', [googlemapsController::class, 'destroy'])->name('spotPost.destroy');
    
    //投稿一覧の表示
    Route::get('/postList', [postListController::class, 'postList'])->name('googlemaps.postList'); 
});

require __DIR__ . '/auth.php';
