<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SejarahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/sejarah', [SejarahController::class, 'index'])->name('sejarah.index');
Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
