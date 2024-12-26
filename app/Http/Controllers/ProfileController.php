<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // Get the authenticated user
        $admin = Auth::user();

        // Pass the user data to the view
        return view('profile', compact('admin'));
    }
}