<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use Illuminate\Http\Request;

class DataPengunjungController extends Controller
{
    // Menampilkan daftar pengunjung
    public function index()
    {
        // Menampilkan data pengunjung dengan pagination
        $dataPengunjung = DataPengunjung::paginate(10);  // Menambahkan pagination
        return view('data_pengunjung.index', compact('dataPengunjung'));
    }

    // Menyimpan data pengunjung baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'umur' => 'required|numeric',
            'asal' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'tgl_kunjungan' => 'required|date',
        ]);

        // Menyimpan data pengunjung baru
        DataPengunjung::create($request->all());

        // Redirect kembali ke halaman daftar pengunjung
        return redirect()->route('data_pengunjung.index')->with('success', 'Data pengunjung berhasil disimpan.');
    }

    // Menghapus data pengunjung
    public function destroy($id)
    {
        // Menemukan pengunjung berdasarkan ID dan menghapusnya
        $pengunjung = DataPengunjung::findOrFail($id);
        $pengunjung->delete();

        // Redirect kembali ke halaman daftar pengunjung dengan pesan sukses
        return redirect()->route('data_pengunjung.index')->with('success', 'Data pengunjung berhasil dihapus.');
    }

    // Menghapus data pengunjung secara massal
    public function bulkDelete(Request $request)
    {
        // Validasi input
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:data_pengunjungs,id',
        ]);

        // Menghapus pengunjung berdasarkan ID yang dipilih
        DataPengunjung::destroy($request->ids);

        // Redirect kembali ke halaman daftar pengunjung dengan pesan sukses
        return redirect()->route('data_pengunjung.index')->with('success', 'Data pengunjung yang dipilih berhasil dihapus.');
    }
}