<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengunjungs = Pengunjung::latest()->paginate(10); 
        return view('pengunjung.index', compact('pengunjungs')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengunjung.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengunjungs',
            'tanggal_kunjungan' => 'required|date',
        ]);

        Pengunjung::create($request->all());

        return redirect()->route('pengunjung.index')->with('success', 'Pengunjung berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengunjung $pengunjung) 
    {
        return view('pengunjung.edit', compact('pengunjung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengunjung $pengunjung) 
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengunjungs,email,' . $pengunjung->id,
            'tanggal_kunjungan' => 'required|date',
        ]);

        $pengunjung->update($request->all());

        return redirect()->route('pengunjung.index')->with('success', 'Pengunjung berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengunjung $pengunjung) 
    {
        $pengunjung->delete();

        return redirect()->route('pengunjung.index')->with('success', 'Pengunjung berhasil dihapus.');
    }
}