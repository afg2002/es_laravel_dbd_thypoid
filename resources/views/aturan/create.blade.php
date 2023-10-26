@extends('template')

@section('title')
    Tambah Data Aturan | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Tambah Data Aturan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('aturan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode_aturan">Kode Aturan <span style="color:red">*</span></label>
                    <input type="text" class="form-control   @error('kode_aturan') is-invalid @enderror" id="kode_aturan" name="kode_aturan" required readonly placeholder="Generate otomatis">
                    @error('kode_aturan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kode_penyakit">Kode Penyakit <span style="color:red">*</span></label>
                    <select class="form-control @error('kode_penyakit') is-invalid @enderror" id="kode_penyakit" name="kode_penyakit">
                        <option value="" disabled selected>Pilih penyakit</option>
                        @foreach($penyakit as $item)
                            <option value="{{ $item->kode_penyakit }}">{{ $item->nama_penyakit }}</option>
                        @endforeach
                        
                    </select>
                    @error('kode_penyakit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kode_gejala">Kode Gejala <span style="color:red">*</span></label>
                    <select class="form-control multiple-select @error('kode_gejala') is-invalid @enderror" id="kode_gejala" name="kode_gejala[]" multiple>
                        @foreach($gejala as $item)
                            <option value="{{ $item->kode_gejala }}">{{ $item->nama_gejala }}</option>
                        @endforeach
                    </select>
                    @error('kode_gejala')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hasil_lab">Hasil Lab <span style="color:red">*</span></label>
                    <select class="form-control multiple-select @error('hasil_lab') is-invalid @enderror" id="hasil_lab" name="hasil_lab[]" multiple>
                        @foreach($hasil_lab as $item)
                            <option value="{{ $item->kode_gejala }}">{{ $item->nama_gejala }}</option>
                        @endforeach
                    </select>
                    @error('hasil_lab')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kode_gejalaPD">Kode Gejala Pemeriksaan <span style="color:red">*</span></label>
                    <select class="form-control multiple-select @error('kode_gejalaPD') is-invalid @enderror" id="kode_gejalaPD" name="kode_gejalaPD[]" multiple>
                        @foreach($gejalaPD as $item)
                            <option value="{{ $item->kode_gejala }}">{{ $item->nama_gejala }}</option>
                        @endforeach
                    </select>
                    @error('kode_gejalaPD')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
        $('.multiple-select').select2();
     });
    </script>
@endsection