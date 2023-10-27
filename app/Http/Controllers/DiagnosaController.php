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

    public function proses($urutan=1){
        $pertanyaan = Pertanyaan::all()->count();
    
        if($pertanyaan == 0){
            return redirect()->route('diagnosa.index')->with('error', 'Buat pertanyaan terlebih dahulu. Silahkan <a href="' . route("pertanyaan.index") . '">buat pertanyaan</a>.');
        } else {
            return redirect()->route('diagnosa.pertanyaan', ['urutan' => 1]);
        }
    }
    
    

    public function diagnosa($urutan)
{
    $totalPertanyaan = Pertanyaan::count();

    // Check if user is trying to access a question out of sequence
    if ($urutan > $totalPertanyaan || $urutan < 1) {
        return redirect()->route('diagnosa.index')->with('error', 'Invalid question number.');
    }

    // Check if user is trying to access a question without answering the previous one
    if ($urutan > 1) {
        $previousUrutan = $urutan - 1;
        $previousQuestionKey = 'gejala_' . $previousUrutan;

        if (!session()->has($previousQuestionKey)) {
            return redirect()->route('diagnosa.pertanyaan', ['urutan' => $previousUrutan])->with('error', 'Please answer the previous question before proceeding.');
        }
    }

    $pertanyaan = Pertanyaan::where('urutan', $urutan)->first();

    if (!$pertanyaan) {
        return redirect()->route('diagnosa.index')->with('error', 'Pertanyaan not found');
    }

    $pilihan_jawaban = explode(',', $pertanyaan->pilihan_jawaban);

    $gejala = Gejala::whereIn('kode_gejala', $pilihan_jawaban)->get();

    return view("diagnosa.pertanyaan", compact("pertanyaan", "gejala", "urutan", "totalPertanyaan"));
}
public function handleResponse(Request $request, $urutan)
{
    $action = $request->input('action');
        
    if ($action === 'next' || $action === 'previous') {
        $pertanyaan = Pertanyaan::where('urutan', $urutan)->first();

        if (!$pertanyaan) {
            return redirect()->route('diagnosa.index')->with('error', 'Pertanyaan not found');
        }

        $pilihan_jawaban = explode(',', $pertanyaan->pilihan_jawaban);

        $gejala = Gejala::whereIn('kode_gejala', $pilihan_jawaban)->get();

        $gejalaKeys = $gejala->pluck('kode_gejala')->toArray(); // Get the keys

        dd($gejalaKeys,$request->all());

        // $gejalaKey = 'gejala_' . $pertanyaan->kode_gejala;

        // if ($action === 'next') {
        //     // Check if an answer is selected
        //     if (!$request->has($gejalaKey)) {
        //         return redirect()->route('diagnosa.pertanyaan', ['urutan' => $urutan])->with('error', 'Please select an answer before proceeding.');
        //     }

        //     // Check if the answer is valid
        //     $selectedAnswer = $request->input($gejalaKey);
        //     if (!in_array($selectedAnswer, $gejalaKeys)) {
        //         return redirect()->route('diagnosa.pertanyaan', ['urutan' => $urutan])->with('error', 'Invalid answer selected.');
        //     }

        //     // Process the response (save it to session, database, etc.)
        //     session([$gejalaKey => $selectedAnswer]);
        // }

        // Redirect to the next or previous question
        $nextUrutan = ($action === 'next') ? $urutan + 1 : $urutan - 1;

        return redirect()->route('diagnosa.pertanyaan', ['urutan' => $nextUrutan]);
    }
}


    

    
    
}
