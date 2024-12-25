<?php

use Illuminate\Support\Facades\Route;

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