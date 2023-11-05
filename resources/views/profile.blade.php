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
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" value="{{ $user->username }}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                </div>
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
                {{-- <form action="{{ route('profil.ubahPassword') }}" method="post"> --}}
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Kata Sandi Saat Ini</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Kata Sandi Baru</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
