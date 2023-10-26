@extends('template')



@section('title')
    Daftar Aturan | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Daftar Aturan
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
        Daftar Aturan
        <a href="{{ route('aturan.create') }}" class="btn btn-success btn-sm float-right">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Kode Penyakit</th>
                        <th scope="col">Kode Gejala</th>
                        <th scope="col">Kode Hasil Lab</th>
                        <th scope="col">Kode Hasil Pemeriksaan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aturan as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->kode_penyakit }}</td>
                        <td>{{ $item->kode_gejala }}</td>
                        <td>{{ $item->hasil_lab }}</td>
                        <td>{{ $item->kode_gejalaPD }}</td>
                        <td>
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <a href="{{ route('aturan.edit', ['aturan' => $item->id]) }}" class="btn btn-info btn-sm mr-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('aturan.destroy', ['aturan' => $item->id]) }}" method="POST">
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