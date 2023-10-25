@extends('template')

@section('title')
    Tambah Data Penyakit | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Tambah Data Penyakit 
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('penyakit.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode_penyakit">Kode Penyakit <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('kode_penyakit') is-invalid @enderror" id="kode_penyakit" name="kode_penyakit" required readonly placeholder="Generate otomatis">
                    @error('kode_penyakit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_penyakit">Nama Penyakit <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama_penyakit') is-invalid @enderror" id="nama_penyakit" name="nama_penyakit" required>
                    @error('nama_penyakit')
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
