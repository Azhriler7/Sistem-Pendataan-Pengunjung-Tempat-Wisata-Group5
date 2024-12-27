<?php

namespace App\Http\Controllers\pengunjung;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Http\Request;

class TambahPengunjung extends Controller
{
    // Show the form for creating a new Pengunjung
    public function create()
    {
        return view('pengunjung.tambah_pengunjung');
    }

    // Store a newly created Pengunjung in storage
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer',
            'asal' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'tanggal_berkunjung' => 'required|date',
        ]);

        Pengunjung::create($request->all());

        return redirect()->route('pengunjung.index')->with('success', 'Pengunjung berhasil ditambahkan.');
    }
}