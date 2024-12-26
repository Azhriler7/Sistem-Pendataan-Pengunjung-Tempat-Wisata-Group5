<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPengunjungController;
use App\Http\Controllers\StatistikPengunjungController;

// Route untuk halaman login dan autentikasi
Route::get('/login', function () {
    return view('admin.login');
})->name('login.form');

Route::post('/login', [AdminController::class, 'login'])->name('login');

// Route untuk logout
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Route untuk halaman dashboard
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// Route untuk halaman registrasi
Route::get('/register', function () {
    return view('admin.register');
})->name('register.form');

// Route untuk halaman profil admin
Route::get('/profile', function () {
    return view('admin.profile');
})->name('profile');

// Route untuk halaman lupa password
Route::get('/forgot-password', function () {
    return view('admin.forgot');
})->name('forgot-password');

// Route untuk statistik pengunjung
Route::get('/statistik', function () {
    return view('admin.statistik');
})->name('statistik.form');

// Route untuk pendataan pengunjung (tambah pengunjung)
Route::get('/pendataan', function () {
    return view('admin.tambah_pengunjung');
})->name('pendataan.form');

// Route untuk menampilkan data pengunjung
Route::get('/data-pengunjung', function () {
    return view('admin.data_pengunjung');
})->name('data-pengunjung.form');

// Route untuk admin dashboard
Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('admin', [AdminController::class, 'store'])->name('admin.store');

// Resource routes untuk DataPengunjung
Route::resource('data-pengunjung', DataPengunjungController::class)->names([
    'index' => 'data-pengunjung.index',
    'create' => 'data-pengunjung.create',
    'store' => 'data-pengunjung.store',
    'show' => 'data-pengunjung.show',
    'edit' => 'data-pengunjung.edit',
    'update' => 'data-pengunjung.update',
    'destroy' => 'data-pengunjung.destroy',
]);

// Resource routes untuk StatistikPengunjung
Route::resource('statistik', StatistikPengunjungController::class)->names([
    'index' => 'statistik.index',
    'create' => 'statistik.create',
    'store' => 'statistik.store',
    'show' => 'statistik.show',
    'edit' => 'statistik.edit',
    'update' => 'statistik.update',
    'destroy' => 'statistik.destroy',
]);

