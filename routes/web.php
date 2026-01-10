<?php

use App\Http\Controllers\googlemapsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [googlemapsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/settings', [SettingsController::class, 'settings'])->name('profile.settings');

Route::get('/googlemapsForm', [googlemapsController::class, 'googlemapsForm'])->name('googlemaps.postForm');
Route::post('/googlemapsForm', [googlemapsController::class, 'spotStore'])->name('SpotStore');

Route::get('/show/{spotPost}', [googlemapsController::class, 'show'])->name('googlemaps.show');

require __DIR__ . '/auth.php';
