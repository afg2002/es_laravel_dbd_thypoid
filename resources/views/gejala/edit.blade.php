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
            <form action="{{ route('gejala.update', $gejala->kode_gejala) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kode_gejala">Kode Gejala</label> <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" value="{{ $gejala->kode_gejala }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_gejala">Nama Gejala</label><span style="color:red">*</span></label> 
                    <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" value="{{ $gejala->nama_gejala }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label><span style="color:red">*</span></label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $gejala->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
