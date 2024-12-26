<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'gmail' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create([
            'nama_lengkap' => $request->nama_lengkap,
            'gmail' => $request->gmail,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($admin);
        return redirect()->route('home');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'gmail' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('gmail', 'password'))) {
            return redirect()->route('home');
        }

        return back()->withErrors(['login' => 'Login failed']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Lupa Password
    public function sendPasswordResetLink(Request $request)
    {
        $request->validate(['gmail' => 'required|email']);

        Password::sendResetLink($request->only('gmail'));
        return back()->with('status', 'Password reset link has been sent!');
    }
}
