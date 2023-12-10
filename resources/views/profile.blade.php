@extends('template')

@section('title')
    Profil | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Profil Pengguna
@endsection

@section('content')

<div class="row">
    
    <!-- Profil Card -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                Profil Pengguna
            </div>
            <div class="card-body">
                <form action="{{ route('profil.ubahNama') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control mb-3" id="username" value="{{ $user->username }}" readonly>
                        
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', Auth::user()->name) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Ubah Nama</button>
                </form>
            </div>
        </div>
    </div>
    

    <!-- Ubah Password Card -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                Ubah Kata Sandi
            </div>
            <div class="card-body">
                <form action="{{ route('profil.ubahPassword') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Kata Sandi Saat Ini</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required value="{{ old('current_password') }}">
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_password">Kata Sandi Baru</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" value="{{ old('new_password') }}" required>
                        @error('new_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" required value="{{ old('confirm_password') }}">
                        @error('confirm_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection
