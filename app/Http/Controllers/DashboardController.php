<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dailyVisitors = Pengunjung::whereDate('tgl_kunjungan', today())->count();
        $weeklyVisitors = Pengunjung::whereBetween('tgl_kunjungan', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();

        return view('dashboard', compact('dailyVisitors', 'weeklyVisitors'));
    }
}
