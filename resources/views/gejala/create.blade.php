@extends('template')

@section('title')
    Tambah Data Gejala | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Tambah Data Gejala 
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('gejala.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode_penyakit">Kode Gejala <span style="color:red">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kode_gejala" id="kode_gejala_G" value="G" checked>
                        <label class="form-check-label" for="kode_gejala_G">
                            G
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kode_gejala" id="kode_gejala_L" value="L">
                        <label class="form-check-label" for="kode_gejala_L">
                            L
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kode_gejala" id="kode_gejala_K" value="K">
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
                    <input type="text" class="form-control @error('nama_gejala') is-invalid @enderror" id="nama_gejala" name="nama_gejala" required>
                    @error('nama_gejala')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi <span style="color:red">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
