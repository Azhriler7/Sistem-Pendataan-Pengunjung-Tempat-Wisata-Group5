<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalPengunjung = Pengunjung::count();

        $dataPerBulanan = Pengunjung::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as jumlah')
        )
        ->groupBy('bulan')
        ->get()
        ->map(function ($item) {
            $item->bulan = date('F', mktime(0, 0, 0, $item->bulan, 1)); 
            return $item;
        });

        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $tahun = Pengunjung::select(DB::raw('YEAR(created_at) as tahun'))
                            ->distinct()
                            ->orderBy('tahun')
                            ->get()
                            ->pluck('tahun')->toArray();

        $dataTahunan = Pengunjung::select(DB::raw('YEAR(created_at) as tahun'), DB::raw('COUNT(*) as jumlah'))
                                 ->groupBy('tahun')
                                 ->get()
                                 ->map(function ($item) use ($tahun) {
                                     $index = array_search($item->tahun, $tahun);
                                     if ($index === false) {
                                         $tahun[] = $item->tahun;
                                         $item->jumlah = 0;
                                     }
                                     return $item;
                                 })
                                 ->sortBy('tahun')
                                 ->values()
                                 ->toArray();

        return view('statistik.statistik', compact('totalPengunjung', 'tahun', 'dataTahunan', 'bulan', 'dataBulanan'));
    }
}