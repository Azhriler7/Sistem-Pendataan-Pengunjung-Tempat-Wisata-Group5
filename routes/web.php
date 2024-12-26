<?php

use Illuminate\Support\Facades\Route;



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
    return view('profile');
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


