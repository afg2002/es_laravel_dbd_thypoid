@extends('template')



@section('title')
    Daftar Gejala | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Daftar Gejala
@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Daftar Gejala
        <a href="{{ route('gejala.create') }}" class="btn btn-success btn-sm float-right">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode gejala</th>
                        <th scope="col">Nama gejala</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gejala as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->kode_gejala }}</td>
                        <td>{{ $item->nama_gejala }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <a href="{{ route('gejala.edit', ['gejala' => $item->kode_gejala]) }}" class="btn btn-info btn-sm mr-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('gejala.destroy', ['gejala' => $item->kode_gejala]) }}" method="POST">
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