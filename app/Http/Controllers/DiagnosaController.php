<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
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
                if(($currentQA == $pertanyaan)){
                    if(!session()->has('dataQA')){
                        return redirect()->route('diagnosa.pertanyaan', ['urutan' => 1]);
                    }
                    return redirect()->route('diagnosa.hasil');

                }
                return redirect()->route('diagnosa.pertanyaan', ['urutan' => 1]);
            }
            return redirect()->route('diagnosa.pertanyaan', ['urutan' => 1]);
        }

        
    }
    
    

    public function diagnosa(Request $request , $urutan)
{
    
    $totalPertanyaan = Pertanyaan::count();

    
    // Check if user is trying to access a question out of sequence
    if ($urutan > $totalPertanyaan || $urutan < 1) {
        return redirect()->route('diagnosa.index')->with('error', 'Invalid question number.');
    }

    // Check if user is trying to access a question without answering the previous one
    if ($urutan > 1) {
        $previousUrutan = $urutan - 1;
        if (!session()->has('dataQA.QA'.$previousUrutan)) {
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

    if ($action === 'next' || $action === 'previous' || $action = 'finish') {
        
        $pertanyaan = Pertanyaan::where('urutan', $urutan)->first();
        if (!$pertanyaan) {
            return redirect()->route('diagnosa.index')->with('error', 'Buat pertanyaan terlebih dahulu. Silahkan <a href="' . route("pertanyaan.index") . '">buat pertanyaan</a>.');
        }

        if ($action === 'next' || $action === 'finish') {

            // Filter request data to get only keys starting with 'gejala_'
            $gejalaResponses = array_filter($request->except('_token'), function($key) {
                return strpos($key, 'gejala_') === 0;
            }, ARRAY_FILTER_USE_KEY);
            
            $pilihan_jawaban = explode(',', $pertanyaan->pilihan_jawaban);
            // dd($gejalaResponses,$pilihan_jawaban);
            
            if(count($gejalaResponses) == 0 || count($pilihan_jawaban) != count($gejalaResponses)) {
                return redirect()->route('diagnosa.pertanyaan',['urutan' => $urutan])->with('error','Belum diisi semua.');
            }

           

            $dataQA = $request->session()->get('dataQA', []);

            // Remove any numeric indices from the session data
            $dataQA["QA".$urutan] = $gejalaResponses;
            $request->session()->put('dataQA', $dataQA);

            $request->session()->put('currentQA', $urutan);

            if ($action === 'finish'){

                $dataQA = $request->session()->get('dataQA', []);
                $groupKeyQA_G = [];
                $groupKeyQA_K = [];
                $groupKeyQA_L = [];
            
                foreach ($dataQA as $key => $value) {
                    if (strpos($key, 'QA') === 0) {
                        foreach ($value as $subKey => $subValue) {
                            if ($subValue === 'ya' && strpos($subKey, 'gejala_') === 0) {
                                $prefixedKey = substr($subKey, strlen('gejala_'));
                                $prefix = substr($prefixedKey, 0, 1);
                                $suffix = substr($prefixedKey, 1);
                                
                                if ($prefix === 'G') {
                                    $groupKeyQA_G[] = $prefixedKey;
                                } elseif ($prefix === 'K') {
                                    $groupKeyQA_K[] = $prefixedKey;
                                } elseif ($prefix === 'L') {
                                    $groupKeyQA_L[] = $prefixedKey;
                                }
                            }
                        }
                    }
                }
                
                $implodeGroupedKeyG = implode(',',$groupKeyQA_G);
                $implodeGroupedKeyL = implode(',',$groupKeyQA_L);
                $implodeGroupedKeyK = implode(',',$groupKeyQA_K);
                $hasilDiagnosa = Aturan::where('kode_gejala', $implodeGroupedKeyG)->where('hasil_lab', $implodeGroupedKeyL)->where('kode_gejalaPD', $implodeGroupedKeyK)->with('penyakit')->get();

                session(['hasilDiagnosa'=> $hasilDiagnosa ]);

                // dd($hasilDiagnosa);
                return redirect()->route('diagnosa.hasil');
            }
            
            
        }

        $nextUrutan = ($action === 'next') ? $urutan + 1 : $urutan - 1;
        
        return redirect()->route('diagnosa.pertanyaan', ['urutan' => $nextUrutan]);
    }
}

public function hasilDiagnosa(Request $request){
    // if(!$request->session()->has('dataQA')){
    //     return redirect()->route('diagnosa.index');
    // }

    return view('diagnosa.hasilDiagnosa');
}

public function resetDiagnosa(Request $request){
    $request->session()->forget('dataQA');
    

    return redirect()->route('diagnosa.index');
}
    
}
