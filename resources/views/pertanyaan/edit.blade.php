@extends('template')

@section('title')
    Edit Pertanyaan | Aplikasi Sistem Pakar
@endsection

@section('pageHeading')
    Edit Pertanyaan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pertanyaan.update', ['pertanyaan' => $pertanyaan->kode_pertanyaan]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kode_pertanyaan">Kode Pertanyaan</label>
                    <input type="text" class="form-control" id="kode_pertanyaan" name="kode_pertanyaan" value="{{ $pertanyaan->kode_pertanyaan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="urutan">Urutan</label>
                    <input type="text" class="form-control" id="urutan" name="urutan" value="{{ $pertanyaan->urutan }}">
                </div>
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="{{ $pertanyaan->pertanyaan }}">
                </div>
                <div class="form-group">
                    <label for="pilihan_jawaban">Pilihan Jawaban</label>
                    <select class="form-control select2" id="pilihan_jawaban" name="pilihan_jawaban[]" multiple>
                        @foreach($pilihan_jawaban as $pilihan)
                            <option value="{{ $pilihan->kode_gejala }}" {{ in_array($pilihan->kode_gejala, explode(',',$pertanyaan->pilihan_jawaban)) ? 'selected' : '' }}>{{ $pilihan->nama_gejala }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
