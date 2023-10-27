@extends('template')

@section('title')
    Tambah Pertanyaan | Aplikasi Sistem Pakar
@endsection

@section('pageHeading')
    Tambah Pertanyaan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pertanyaan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode_pertanyaan">Kode Pertanyaan</label>
                    <input type="text" class="form-control" id="kode_pertanyaan" name="kode_pertanyaan" readonly placeholder="Generate Otomatis">
                </div>
                <div class="form-group">
                    <label for="urutan">Urutan</label> <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="urutan" name="urutan">
                </div>
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label> <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan">
                </div>
                <div class="form-group">
                    <label for="pilihan_jawaban">Pilihan Jawaban</label> <span style="color:red">*</span></label>
                    <select class="form-control select2" id="pilihan_jawaban" name="pilihan_jawaban[]" multiple>
                        @foreach($pilihan_jawaban as $pilihan)
                            <option value="{{ $pilihan->kode_gejala }}">{{ $pilihan->nama_gejala }}</option>
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
