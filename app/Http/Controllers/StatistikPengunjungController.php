<?php

namespace App\Http\Controllers;

use App\Models\StatistikPengunjung;
use Illuminate\Http\Request;

class StatistikPengunjungController extends Controller
{
    public function index()
    {
        $statistik = StatistikPengunjung::all();
        return view('statistik.index', compact('statistik'));
    }

    public function statistik()
    {
        $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $dataBulanan = [120, 150, 200, 180, 300, 250, 400, 320, 500, 450, 600, 700]; // Contoh data bulanan
    
        $tahun = ['2021', '2022', '2023'];
        $dataTahunan = [2500, 3000, 3200]; // Contoh data tahunan

        return view('admin.statistik', compact('bulan', 'dataBulanan', 'tahun', 'dataTahunan'));
    }

}
