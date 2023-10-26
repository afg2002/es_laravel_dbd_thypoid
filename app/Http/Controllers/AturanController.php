<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class AturanController extends Controller
{
    
    public function index()
    {
        $aturan = Aturan::all();
        return view('aturan.index', compact('aturan'));
    }

   
    public function create()
    {
        $gejala = Gejala::where('kode_gejala', 'LIKE', 'G%')->get();
        $hasil_lab = Gejala::where('kode_gejala', 'LIKE', 'L%')->get();
        $gejalaPD = Gejala::where('kode_gejala', 'LIKE', 'K%')->get();
        $penyakit = Penyakit::all();
        return view('aturan.create',compact('gejala','hasil_lab','gejalaPD','penyakit'));
    }

    public function store(Request $request)
{
    $request->validate([
        'kode_penyakit' => 'required',
    ]);

    // Mengambil nilai terkecil dari array dan mengurutkannya
    $kode_gejala = $request->kode_gejala ?? [];
    sort($kode_gejala);
    $kode_gejala = implode(',', array_unique($kode_gejala));

    $hasil_lab = $request->hasil_lab ?? [];
    sort($hasil_lab);
    $hasil_lab = implode(',', array_unique($hasil_lab));

    $kode_gejalaPD = $request->kode_gejalaPD ??[];
    sort($kode_gejalaPD);
    $kode_gejalaPD = implode(',', array_unique($kode_gejalaPD));

    
    Aturan::create([
        'kode_penyakit' => $request->kode_penyakit,
        'kode_gejala' => $kode_gejala,
        'hasil_lab' => $hasil_lab,
        'kode_gejalaPD' => $kode_gejalaPD,
    ]);

    return redirect()->route('aturan.index')->with('success', 'Data aturan berhasil ditambahkan.');
}

    


    public function edit($id)
    {
        $aturan = Aturan::where('id', $id)->firstOrFail();
        $gejala = Gejala::where('kode_gejala', 'LIKE', 'G%')->get();
        $hasil_lab = Gejala::where('kode_gejala', 'LIKE', 'L%')->get();
        $gejalaPD = Gejala::where('kode_gejala', 'LIKE', 'K%')->get();
        $penyakit = Penyakit::all();
        return view('aturan.edit', compact('aturan','penyakit','gejala','hasil_lab','gejalaPD'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'kode_penyakit' => 'required',
    ]);

    $aturan = Aturan::findOrFail($id);

    // Mengambil nilai terkecil dari array dan mengurutkannya
    $kode_gejala = $request->kode_gejala ?? [];
    sort($kode_gejala);
    $kode_gejala = implode(',', array_unique($kode_gejala));

    $hasil_lab = $request->hasil_lab ?? [];
    sort($hasil_lab);
    $hasil_lab = implode(',', array_unique($hasil_lab));

    $kode_gejalaPD = $request->kode_gejalaPD ??[];
    sort($kode_gejalaPD);
    $kode_gejalaPD = implode(',', array_unique($kode_gejalaPD));

    $aturan->update([
        'kode_penyakit' => $request->kode_penyakit,
        'kode_gejala' => $kode_gejala,
        'hasil_lab' => $hasil_lab,
        'kode_gejalaPD' => $kode_gejalaPD,
    ]);

    return redirect()->route('aturan.index')->with('success', 'Data aturan berhasil diperbarui.');
}


    
    public function destroy($id)
    {
        $aturan = Aturan::find($id);
        $aturan->delete();

        return redirect()->route('aturan.index')->with('success', 'Data aturan berhasil dihapus.');
    }
}

