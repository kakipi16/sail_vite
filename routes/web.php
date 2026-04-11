<?php

use App\Http\Controllers\GoogleMapsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PostListController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [GoogleMapsController::class, 'index'])
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
    Route::get('/googlemapsForm', [GoogleMapsController::class, 'googlemapsForm'])->name('googlemaps.postForm');
    Route::post('/googlemapsForm', [GoogleMapsController::class, 'spotStore'])->name('SpotStore');
    
    //投稿詳細の表示
    Route::get('/show/{spotPost}', [GoogleMapsController::class, 'show'])->name('googlemaps.show');
    
    //編集画面・更新処理（追加）
    Route::get('/show/{spotPost}/edit', [GoogleMapsController::class, 'edit'])->name('spotPost.edit');
    Route::patch('/show/{spotPost}', [GoogleMapsController::class, 'update'])->name('spotPost.update');
    Route::delete('/show/{spotPost}', [GoogleMapsController::class, 'destroy'])->name('spotPost.destroy');
    
    //投稿一覧の表示
    Route::get('/postList', [PostListController::class, 'postList'])->name('googlemaps.postList'); 
});

require __DIR__ . '/auth.php';
