@extends('template')

@section('title')
    Hasil Diagnosa | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Hasil Diagnosa
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Hasil Diagnosa</h5>
            @if(count(session('hasilDiagnosa')) > 0)
                @foreach(session('hasilDiagnosa') as $diagnosa)
                    <div class="result">
                        <h3>{{ $diagnosa->penyakit->nama_penyakit }}</h3>
                        <p>{{ $diagnosa->penyakit->deskripsi }}</p>
                    </div>
                @endforeach
                
            @else
                <div class="alert alert-info">
                    Tidak ada hasil diagnosa yang ditemukan.
                </div>
                
            @endif
            <form action="{{route('diagnosa.reset')}}" method="post">
                @csrf
                <button class="btn btn-primary" type="submit" value="Submit">Diagnosa Ulang</button>
            </form>
            <a href="{{route('diagnosa.index')}}" class="btn btn-warning mt-2">Kembali</a>

        </div>
    </div>
@endsection
