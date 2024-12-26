<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use Illuminate\Http\Request;

class DataPengunjungController extends Controller
{
    public function index()
    {
        $dataPengunjung = DataPengunjung::all();
        return view('data_pengunjung.index', compact('dataPengunjung'));
    }

    public function store(Request $request)
    {
        DataPengunjung::create($request->all());
        return redirect()->route('data_pengunjung.index');
    }

    public function destroy($id)
    {
        DataPengunjung::findOrFail($id)->delete();
        return redirect()->route('data_pengunjung.index');
    }
}

