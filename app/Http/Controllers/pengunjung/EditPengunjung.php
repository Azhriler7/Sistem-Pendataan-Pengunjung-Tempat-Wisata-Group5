<?php

namespace App\Http\Controllers\pengunjung;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Http\Request;

class EditPengunjung extends Controller
{
    // Show the form for editing the specified Pengunjung
    public function edit($id)
    {
        $pengunjung = Pengunjung::findOrFail($id);
        return view('pengunjung.edit_pengunjung', compact('pengunjung'));
    }

    // Update the specified Pengunjung in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer',
            'asal' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'tanggal_berkunjung' => 'required|date',
        ]);

        $pengunjung = Pengunjung::findOrFail($id);
        $pengunjung->update($request->all());

        return redirect()->route('pengunjung.index')->with('success', 'Pengunjung berhasil diperbarui.');
    }
}