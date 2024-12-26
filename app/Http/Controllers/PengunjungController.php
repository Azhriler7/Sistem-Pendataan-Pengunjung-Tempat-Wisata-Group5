<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengunjungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengunjungs = Pengunjung::latest()->paginate(10);
        return view('pengunjung.index', compact('pengunjungs'));
    }

    public function create()
    {
        return view('pengunjung.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'umur' => 'required|integer|min:0',
            'asal' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'tgl_kunjungan' => 'required|date',
        ]);

        Pengunjung::create($validated);
        return redirect()->route('pengunjung.index')->with('success', 'Data pengunjung berhasil ditambahkan!');
    }

    public function bulkDelete(Request $request)
    {
        if (!$request->has('ids')) {
            return back()->with('error', 'Pilih minimal satu data untuk dihapus!');
        }

        Pengunjung::whereIn('id', $request->ids)->delete();
        return back()->with('success', 'Data terpilih berhasil dihapus!');
    }

    public function statistik()
    {
        // Statistik harian
        $dailyVisitors = Pengunjung::whereDate('tgl_kunjungan', today())
            ->count();

        // Statistik mingguan
        $weeklyVisitors = Pengunjung::whereBetween('tgl_kunjungan', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();

        // Statistik berdasarkan jenis kelamin
        $genderStats = Pengunjung::select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->get();

        // Statistik berdasarkan umur
        $ageStats = Pengunjung::select(
            DB::raw('
                CASE 
                    WHEN umur < 18 THEN "< 18"
                    WHEN umur BETWEEN 18 AND 30 THEN "18-30"
                    WHEN umur BETWEEN 31 AND 50 THEN "31-50"
                    ELSE "> 50"
                END as age_group
            '),
            DB::raw('count(*) as total')
        )
            ->groupBy('age_group')
            ->get();

        return view('statistik', compact('dailyVisitors', 'weeklyVisitors', 'genderStats', 'ageStats'));
    }
}

