@extends('template')

@section('title')
    Diagnosa | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Diagnosa Penyakit
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Memulai Diagnosa</h5>
            <p class="card-text">
                Selamat datang di Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid. Diagnosa ini akan membantu Anda mengetahui apakah Anda mungkin terkena penyakit DBD atau Thypoid berdasarkan gejala-gejala yang Anda alami.
            </p>
            <p class="card-text">
                Langkah-langkah untuk memulai diagnosa:
            </p>
            <ol>
                <li>Mulai dengan mengklik tombol "Mulai Diagnosa" di bawah.</li>
                <li>Anda akan diberikan serangkaian pertanyaan terkait gejala-gejala yang Anda alami. Mohon jawab dengan jujur dan seakurat mungkin.</li>
                <li>Setelah menjawab semua pertanyaan, sistem akan memberikan hasil diagnosa berdasarkan informasi yang Anda berikan.</li>
                <li>Silakan baca hasil diagnosa dengan cermat. Jika Anda memiliki pertanyaan atau membutuhkan saran lebih lanjut, segera hubungi tenaga medis.</li>
            </ol>
            <a href="{{route('diagnosa.proses', ['urutan' => 1])}}" class="btn btn-primary">Mulai Diagnosa</a>
        </div>
    </div>
@endsection
