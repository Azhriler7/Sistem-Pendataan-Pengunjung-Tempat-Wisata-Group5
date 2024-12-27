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
        $pengunjungData = Pengunjung::all();
        return view('pengunjung.data_pengunjung', compact('pengunjungData'));
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
            'nama_pengunjung' => 'required|string|max:255',
            'umur' => 'required|integer',
            'asal' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'tgl_kunjungan' => 'required|date',
        ]);

        Pengunjung::create($request->all());

        return redirect()->route('data-pengunjung.form')
                         ->with('success', 'Pengunjung created successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $detailPengunjung = Pengunjung::find($id);
    return view('pengunjung.edit_pengunjung', compact('detailPengunjung'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'umur' => 'required|integer',
            'asal' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'tgl_kunjungan' => 'required|date',
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