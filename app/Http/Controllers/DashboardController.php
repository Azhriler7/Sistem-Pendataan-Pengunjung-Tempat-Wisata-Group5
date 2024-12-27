<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Fetch the total number of visitors
        $totalPengunjung = Pengunjung::count();

        return view('dashboard', compact('totalPengunjung'));
    }
}