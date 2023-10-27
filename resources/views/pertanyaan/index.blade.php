@extends('template')

@section('title')
    Daftar Pertanyaan | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Daftar Pertanyaan
@endsection

@section('content')

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Daftar Pertanyaan
            <a href="{{ route('pertanyaan.create') }}" class="btn btn-success btn-sm float-right">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Pertanyaan</th>
                            <th scope="col">Urutan</th>
                            <th scope="col">Pertanyaan</th>
                            <th scope="col">Pilihan Jawaban</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pertanyaan as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->kode_pertanyaan }}</td>
                                <td>{{ $item->urutan }}</td>
                                <td>{{ $item->pertanyaan }}</td>
                                <td>{{ $item->pilihan_jawaban }}</td>
                                <td>
                                    <div style="display: flex; align-items: center; justify-content: space-between;">
                                        <a href="{{ route('pertanyaan.edit', ['pertanyaan' => $item->kode_pertanyaan]) }}" class="btn btn-info btn-sm mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pertanyaan.destroy', ['pertanyaan' => $item->kode_pertanyaan]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
