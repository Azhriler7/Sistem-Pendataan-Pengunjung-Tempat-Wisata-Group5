<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPengunjungController;
use App\Http\Controllers\StatistikPengunjungController;

// Route untuk menampilkan halaman login
Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/register', function () {
    return view('admin.register');
});

Route::get('/profile', function () {
    return view('admin.profile');
});

Route::get('/forgot-password', function () {
    return view('admin.forgot');
});

Route::get('/statistik', function () {
    return view('admin.statistik');
});

Route::get('/pendataan', function () {
    return view('admin.tambah_pengunjung');
});

Route::get('/data-pengunjung', function () {
    return view('admin.data_pengunjung');
});

Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('admin', [AdminController::class, 'store']);


Route::resource('data_pengunjung', DataPengunjungController::class);
Route::resource('statistik', StatistikPengunjungController::class);
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
