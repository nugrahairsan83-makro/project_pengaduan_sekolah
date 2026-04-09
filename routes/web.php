<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController; // Ubah dari SiswaController
use App\Http\Controllers\AdminController;

// Redirect halaman awal ke login
Route::get('/', function () {
    return redirect('/login');
});

// Route Login, Logout, & Registrasi (Tahap 4)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Menambahkan Route Registrasi Warga
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route Khusus WARGA (Menggunakan guard default 'web' untuk tabel users)
Route::middleware(['auth'])->group(function () {
    Route::get('/warga/dashboard', [WargaController::class, 'index'])->name('warga.dashboard');
    Route::post('/warga/lapor', [WargaController::class, 'store'])->name('warga.store');
});

// Route Khusus ADMIN (Tetap menggunakan guard 'admin')
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/update/{id}', [AdminController::class, 'updateStatus'])->name('admin.update');
});