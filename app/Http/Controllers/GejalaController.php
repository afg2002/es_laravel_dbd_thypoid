<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
     public function index()
    {
        $gejala = Gejala::all();
        return view('gejala.index', compact('gejala'));
    }

    public function create()
    {
        return view('gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gejala' => 'required',
            'deskripsi' => 'required',
            'kode_gejala' => 'required' // Tambahkan validasi untuk kode_gejala
        ]);
    
        $prefix = $request->kode_gejala; // Ambil prefiks dari radio button
    
        // Mengambil kode_gejala terakhir untuk prefiks tertentu
        $lastKode = Gejala::where('kode_gejala', 'like', $prefix.'%')->orderBy('kode_gejala', 'desc')->first();
    
        // Mengecek apakah sudah ada kode_gejala sebelumnya dengan prefiks tertentu
        if ($lastKode) {
            // Memecah kode_gejala untuk mendapatkan angka belakangnya
            $lastNumber = (int)substr($lastKode->kode_gejala, strlen($prefix));
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }
    
        // Menggabungkan prefiks dan nomor berikutnya
        $newKode = $prefix . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
    
        // Membuat gejala baru
        $gejala = Gejala::create([
            'kode_gejala' => $newKode,
            'nama_gejala' => $request->nama_gejala,
            'deskripsi' => $request->deskripsi,
        ]);
    
        return redirect()->route('gejala.index')->with('success', 'Data gejala berhasil ditambahkan.');
    }
    
public function edit($kode_gejala)
{
    $gejala = Gejala::where('kode_gejala', $kode_gejala)->firstOrFail();
    return view('gejala.edit', compact('gejala'));
}

public function update(Request $request, $kode_gejala)
{
    $request->validate([
        'nama_gejala' => 'required',
        'deskripsi' => 'required',
    ]);

    $gejala = Gejala::where('kode_gejala', $kode_gejala)->firstOrFail();
    
    $gejala->update([
        'nama_gejala' => $request->nama_gejala,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('gejala.index', $gejala->kode_gejala)->with('success', 'Data gejala berhasil diperbarui.');
}

public function destroy($kode_gejala)
{
    $gejala = Gejala::where('kode_gejala', $kode_gejala)->firstOrFail();
    $gejala->delete();

    return redirect()->route('gejala.index')->with('success', 'Data gejala berhasil dihapus.');
}

}
