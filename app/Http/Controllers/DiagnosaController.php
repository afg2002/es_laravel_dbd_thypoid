<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index(){
        return view("diagnosa.index");
    }

    public function proses($urutan){
        try{
            $pertanyaan = Pertanyaan::where('urutan',$urutan)->first();
        $totalPertanyaan = Pertanyaan::all()->count();
    
        // Pisahkan pilihan jawaban menjadi array
        $pilihan_jawaban = explode(',', $pertanyaan->pilihan_jawaban);
    
        if (count($pilihan_jawaban) == 1 && $pilihan_jawaban[0] == 'G01') {
            // Jika hanya ada satu pilihan jawaban dan itu adalah 'G01'
            $gejala = Gejala::where('kode_gejala', 'G01')->get();
        } else {
            // Jika ada lebih dari satu pilihan jawaban atau pilihan jawaban bukan hanya 'G01'
            $gejala = Gejala::whereIn('kode_gejala', $pilihan_jawaban)->get();
        }
        
        return view("diagnosa.proses",compact("pertanyaan", "gejala","urutan","totalPertanyaan"));

        }catch(\ErrorException $e){
            // var_dump($e);
            return redirect()->route('diagnosa.index')->with('error',$e);
        }
    }
    
}
