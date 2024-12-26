<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;

class StatistikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show the statistics page
    public function index()
    {
        // Contoh pengambilan data statistik, sesuaikan dengan kebutuhan Anda
        $totalPengunjung = Pengunjung::count();
        $pengunjungPerBulan = Pengunjung::selectRaw('MONTH(created_at) as bulan, COUNT(*) as jumlah')
                                        ->groupBy('bulan')
                                        ->get();

        return view('statistik.index', compact('totalPengunjung', 'pengunjungPerBulan'));
    }
}