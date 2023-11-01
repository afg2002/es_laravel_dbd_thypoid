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
            if(session()->has('currentQA')){
                $currentQA = session()->get('currentQA');
                if(is_array($currentQA) && count($currentQA )>1){
                    return redirect()->route('diagnosa.pertanyaan', ['urutan' => $currentQA]);
                }
            }
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

        if (!session()->has('QA')) {
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
            return redirect()->route('diagnosa.index')->with('error', 'Buat pertanyaan terlebih dahulu. Silahkan <a href="' . route("pertanyaan.index") . '">buat pertanyaan</a>.');
        }

        

        if ($action === 'next') {
            // dd($pertanyaan,$pertanyaan->pilihan_jawaban,$request->all());

            

             // Filter request data to get only keys starting with 'gejala_'
            $gejalaResponses = array_filter($request->except('_token'), function($key) {
                return strpos($key, 'gejala_') === 0;
            }, ARRAY_FILTER_USE_KEY);
            
            $pilihan_jawaban = explode(',', $pertanyaan->pilihan_jawaban);
            // dd(count($pilihan_jawaban),$gejalaResponses);
            if(count($gejalaResponses) == 0 || count($pilihan_jawaban) != count($gejalaResponses)) {
                return redirect()->route('diagnosa.pertanyaan',['urutan' => $urutan])->with('error','Belum diisi semua.');
            }

           
            dd($gejalaResponses);
            $request->session()->push('QA', $gejalaResponses);
            

            // dd(session()->get('data'));
        }

        $nextUrutan = ($action === 'next') ? $urutan + 1 : $urutan - 1;
        
        session(['currentQA' => $nextUrutan]);
        return redirect()->route('diagnosa.pertanyaan', ['urutan' => $nextUrutan]);
    }
}


    

    
    
}
