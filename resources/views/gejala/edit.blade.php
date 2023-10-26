@extends('template')

@section('title')
    Edit Data Gejala | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Edit Data Gejala 
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('gejala.update', ['gejala' => $gejala->kode_gejala]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kode_gejala">Kode Gejala <span style="color:red">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kode_gejala" id="kode_gejala_G" value="G" {{ $gejala->kode_gejala[0] == 'G' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kode_gejala_G">
                            G
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kode_gejala" id="kode_gejala_L" value="L" {{ $gejala->kode_gejala[0] == 'L' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kode_gejala_L">
                            L
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kode_gejala" id="kode_gejala_K" value="K" {{ $gejala->kode_gejala[0] == 'K' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kode_gejala_K">
                            K
                        </label>
                    </div>
                    @error('kode_gejala')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_gejala">Nama Gejala <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama_gejala') is-invalid @enderror" id="nama_gejala" name="nama_gejala" required value="{{ $gejala->nama_gejala }}">
                    @error('nama_gejala')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi <span style="color:red">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ $gejala->deskripsi }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
