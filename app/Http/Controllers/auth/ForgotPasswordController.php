<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm()
    {
        return view('auth.forgot');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'gmail' => 'required|email|exists:admin,gmail',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::where('gmail', $request->gmail)->first();
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('login.form')->with('status', 'Password has been reset successfully.');
    }
}