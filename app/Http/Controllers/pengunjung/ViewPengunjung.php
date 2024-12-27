<?php

namespace App\Http\Controllers\pengunjung;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Http\Request;

class ViewPengunjung extends Controller
{
    // Display the specified Pengunjung
    public function show($id)
    {
        $pengunjung = Pengunjung::findOrFail($id);
        return view('view_pengunjung', compact('pengunjung'));
    }
}