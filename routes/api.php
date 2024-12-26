<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as AdminController;

Route::post('/login', [AdminController::class, 'Login']);
Route::post('/register', [AdminController::class, 'Register']);
Route::post('/forgot-password', [AdminController::class, 'ForgotPassword']);
