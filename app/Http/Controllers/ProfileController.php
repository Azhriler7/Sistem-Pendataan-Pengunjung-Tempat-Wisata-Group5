<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show the profile page
    public function showProfile()
    {
        $admin = Auth::user();
        return view('profile', compact('admin'));
    }

    // Update the profile
    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'gmail' => 'required|string|email|max:255|unique:admins,gmail,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin = Auth::user();
        $admin->nama_lengkap = $request->nama_lengkap;
        $admin->gmail = $request->gmail;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}