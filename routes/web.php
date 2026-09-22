<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasupController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SmartLockController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/verify-otp', [AuthController::class, 'showVerifyOtpForm'])->name('verify.otp');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('profile.password');


    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/barang-supplier', [BasupController::class, 'index'])->name('basup.index');
    Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk.index');
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/smartlock', [SmartLockController::class, 'index'])->name('smartlock.index');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});