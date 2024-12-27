<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;
use Carbon\Carbon;

class StatistikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show the statistics page
    public function index()
    {
        // Fetch the total number of visitors
        $totalPengunjung = Pengunjung::count();

        // Fetch the number of visitors per day
        $pengunjungPerHari = Pengunjung::selectRaw('DATE(tgl_kunjungan) as tanggal, COUNT(*) as jumlah')
                                       ->groupBy('tanggal')
                                       ->orderBy('tanggal')
                                       ->get();

        // Fetch the number of visitors per month
        $pengunjungPerBulan = Pengunjung::selectRaw('DATE_FORMAT(tgl_kunjungan, "%Y-%m") as bulan, COUNT(*) as jumlah')
                                        ->groupBy('bulan')
                                        ->orderBy('bulan')
                                        ->get();

        return view('statistik.index', compact('totalPengunjung', 'pengunjungPerHari', 'pengunjungPerBulan'));
    }
}