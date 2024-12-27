<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $pengunjungs = Pengunjung::all();
        return view('pengunjung.data_pengunjung', compact('pengunjungs'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('pengunjung.create');
    }

    // Store a newly created resource in storage.
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

    // Display the specified resource.
    public function show($id)
    {
        $pengunjung = Pengunjung::find($id);
        return view('pengunjung.show', compact('pengunjung'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $pengunjung = Pengunjung::find($id);
        return view('pengunjung.edit', compact('pengunjung'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer',
            'asal' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'tanggal_berkunjung' => 'required|date',
        ]);

        $pengunjung = Pengunjung::find($id);
        $pengunjung->update($request->all());

        return redirect()->route('pengunjung.index')->with('success', 'Pengunjung berhasil diperbarui.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $pengunjung = Pengunjung::find($id);
        $pengunjung->delete();

        return redirect()->route('pengunjung.index')->with('success', 'Pengunjung berhasil dihapus.');
    }
}