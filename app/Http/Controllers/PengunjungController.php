<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;

class PengunjungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display a listing of the resource.
    public function index()
    {
        $pengunjungs = Pengunjung::all();
        return view('pengunjung.data_pengunjung', compact('pengunjungs'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('pengunjung.tambah_pengunjung');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'gmail' => 'required|string|email|max:255|unique:pengunjungs',
            'tanggal_kunjungan' => 'required|date',
        ]);

        Pengunjung::create($request->all());

        return redirect()->route('data-pengunjung.form')
                         ->with('success', 'Pengunjung created successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $pengunjung = Pengunjung::find($id);
        return view('pengunjung.edit_pengunjung', compact('pengunjung'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'gmail' => 'required|string|email|max:255|unique:pengunjungs,gmail,' . $id,
            'tanggal_kunjungan' => 'required|date',
        ]);

        $pengunjung = Pengunjung::find($id);
        $pengunjung->update($request->all());

        return redirect()->route('data-pengunjung.form')
                         ->with('success', 'Pengunjung updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $pengunjung = Pengunjung::find($id);
        $pengunjung->delete();

        return redirect()->route('data-pengunjung.form')
                         ->with('success', 'Pengunjung deleted successfully.');
    }
}