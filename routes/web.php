<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk user yang belum login (guest)
Route::middleware('guest')->group(function () {
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
});

// Routes untuk user yang sudah login dan memiliki role admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
    
    // Resource route untuk siswa
    Route::resource('admin/siswa', SiswaController::class);
    
    // Resource route untuk akun, seharusnya menggunakan LoginRegisterController atau UserController
    Route::resource('admin/akun', LoginRegisterController::class);
    
    // Update email dan password akun
    Route::put('/updateEmail/{akun}', [LoginRegisterController::class, 'updateEmail'])->name('updateEmail');
    Route::put('/updatePassword/{akun}', [LoginRegisterController::class, 'updatePassword'])->name('updatePassword');
    
    // Resource route untuk pelanggaran
    Route::resource('admin/pelanggaran', PelanggaranController::class);
    
    // Logout
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
});
// Rute untuk Dashboard (user yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});