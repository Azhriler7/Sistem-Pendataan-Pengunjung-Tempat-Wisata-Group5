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