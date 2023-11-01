<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        return view("pertanyaan.index", compact("pertanyaan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pilihan_jawaban = Gejala::all();
        return view('pertanyaan.create', compact('pilihan_jawaban'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Generate kode pertanyaan
    $lastKode = Pertanyaan::orderBy('kode_pertanyaan', 'desc')->first();

    if($lastKode) {
        $lastNumber = (int) substr($lastKode->kode_pertanyaan, 1);
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    $newKode = 'T'.str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

    try {
        $request->validate([
            'urutan' => 'required|numeric',
            'pertanyaan' => 'required',
            'pilihan_jawaban' => 'required|array',
        ]);

        Pertanyaan::create([
            'kode_pertanyaan' => $newKode,
            'urutan' => $request->urutan,
            'pertanyaan' => $request->pertanyaan,
            'pilihan_jawaban' => implode(',', $request->pilihan_jawaban),
        ]);

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    } catch (\Exception $e) {
        return redirect()->route('pertanyaan.index')->with('error', $e->getMessage());
    }
}


    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kode_pertanyaan)
    {
        $pertanyaan = Pertanyaan::where('kode_pertanyaan', $kode_pertanyaan)->firstOrFail();
        $pilihan_jawaban = Gejala::all();
        return view('pertanyaan.edit', compact('pertanyaan','pilihan_jawaban'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_pertanyaan)
    {
        $request->validate([
            'urutan' => 'required',
            'pertanyaan' => 'required',
            'pilihan_jawaban' => 'required|array',
        ]);
    
        $pertanyaan = Pertanyaan::where('kode_pertanyaan', $kode_pertanyaan)->first();
    
        $pertanyaan->update([
            'urutan' => $request->urutan,
            'pertanyaan' => $request->pertanyaan,
            'pilihan_jawaban' => implode(',', $request->pilihan_jawaban), // Menggabungkan pilihan jawaban menjadi satu string
        ]);
    
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_pertanyaan)
    {
        $pertanyaan = Pertanyaan::where('kode_pertanyaan', $kode_pertanyaan);
        $pertanyaan->delete();

        return redirect()->route('pertanyaan.index')->with('success', 'Data pertanyaan berhasil dihapus.');
    }
}
