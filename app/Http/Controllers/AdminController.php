<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi data login
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Jika validasi gagal, kembali ke halaman login dengan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Cek kredensial dan login
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Redirect ke dashboard jika login berhasil
            return redirect()->route('dashboard');
        }

        // Jika login gagal, kembalikan error
        return back()->withErrors(['error' => 'Login failed. Please check your credentials and try again.']);
    }

    // Menangani proses logout
    public function logout()
    {
        Auth::logout();
        // Redirect ke halaman login setelah logout
        return redirect()->route('login.form');
    }
}