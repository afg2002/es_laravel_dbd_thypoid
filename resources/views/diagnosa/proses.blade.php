@extends('template')

@section('title')
    Diagnosa | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Diagnosa Penyakit 
@endsection

@section('content')
    <div class="mb-5">
        Ini adalah pertanyaan ke {{$urutan}} dari {{$totalPertanyaan}}
    </div>


    <h5>{{ $pertanyaan->pertanyaan }}</h5>


    <form action="#" method="post">
        @csrf
    
        @foreach($gejala as $item)
        <div class="mb-2 mt-3">
            <b>{{ $item->nama_gejala }}</b>
        </div>
    
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gejala_{{ $item->kode_gejala }}" id="ya_{{ $item->kode_gejala }}" value="ya">
            <label class="form-check-label" for="ya_{{ $item->kode_gejala }}">
                Ya
            </label>
        </div>
    
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gejala_{{ $item->kode_gejala }}" id="tidak_{{ $item->kode_gejala }}" value="tidak">
            <label class="form-check-label" for="tidak_{{ $item->kode_gejala }}">
                Tidak
            </label>
        </div>
    
        @error('gejala_' . $item->kode_gejala)
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    @endforeach
    
    
        <button type="submit" class="btn btn-primary">Next</button>
    </form>
    

    @if ($urutan != 1)
     <a href="{{route('diagnosa.proses', ['urutan' => $urutan-1])}}" class="btn btn-primary">Back</a>
    @endif
    {{-- agar urutan ini bisa selalu bertambah saat di next --}}

    
    @if ($urutan == $totalPertanyaan)
         <a href="" class="btn btn-primary">Selesai</a>
    @else
        <a href="{{route('diagnosa.proses', ['urutan' => $urutan+1])}}" class="btn btn-primary">Next</a>
    @endif
@endsection
