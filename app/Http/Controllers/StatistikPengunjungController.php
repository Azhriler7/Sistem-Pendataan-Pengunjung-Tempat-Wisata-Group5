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
}
