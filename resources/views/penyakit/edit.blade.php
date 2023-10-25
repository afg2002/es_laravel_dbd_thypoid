@extends('template')

@section('title')
    Edit Data Penyakit | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Edit Data Penyakit 
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('penyakit.update', $penyakit->kode_penyakit) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kode_penyakit">Kode Penyakit</label> <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" value="{{ $penyakit->kode_penyakit }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_penyakit">Nama Penyakit</label><span style="color:red">*</span></label> 
                    <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" value="{{ $penyakit->nama_penyakit }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label><span style="color:red">*</span></label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $penyakit->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
