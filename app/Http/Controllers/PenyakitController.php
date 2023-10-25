<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
     public function index()
    {
        $penyakit = Penyakit::all();
        return view('penyakit.index', compact('penyakit'));
    }

    public function create()
    {
        return view('penyakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penyakit' => 'required',
            'deskripsi' => 'required',
        ]);
    
        // Mengambil kode_penyakit terakhir
        $lastKode = Penyakit::orderBy('kode_penyakit', 'desc')->first();
    
        // Mengecek apakah sudah ada kode_penyakit sebelumnya
        if($lastKode) {
            // Memecah kode_penyakit untuk mendapatkan angka belakangnya
            $lastNumber = (int) substr($lastKode->kode_penyakit, 1);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }
    
        // Menggabungkan prefiks dan nomor berikutnya
        $newKode = 'P'.str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
    
        // Membuat penyakit baru
        $penyakit = Penyakit::create([
            'kode_penyakit' => $newKode,
            'nama_penyakit' => $request->nama_penyakit,
            'deskripsi' => $request->deskripsi,
        ]);
    
        return redirect()->route('penyakit.index')->with('success', 'Data penyakit berhasil ditambahkan.');
    }

public function edit($kode_penyakit)
{
    $penyakit = Penyakit::where('kode_penyakit', $kode_penyakit)->firstOrFail();
    return view('penyakit.edit', compact('penyakit'));
}

public function update(Request $request, $kode_penyakit)
{
    $request->validate([
        'nama_penyakit' => 'required',
        'deskripsi' => 'required',
    ]);

    $penyakit = Penyakit::where('kode_penyakit', $kode_penyakit)->firstOrFail();
    
    $penyakit->update([
        'nama_penyakit' => $request->nama_penyakit,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('penyakit.index', $penyakit->kode_penyakit)->with('success', 'Data penyakit berhasil diperbarui.');
}

public function destroy($kode_penyakit)
{
    $penyakit = Penyakit::where('kode_penyakit', $kode_penyakit)->firstOrFail();
    $penyakit->delete();

    return redirect()->route('penyakit.index')->with('success', 'Data penyakit berhasil dihapus.');
}

}
