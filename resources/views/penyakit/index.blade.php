@extends('template')

@section('title')
    Daftar Penyakit | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Daftar Penyakit 
@endsection

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Daftar Penyakit
        <a href="{{ route('penyakit.create') }}" class="btn btn-success btn-sm float-right">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode penyakit</th>
                        <th scope="col">Nama penyakit</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penyakit as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->kode_penyakit }}</td>
                        <td>{{ $item->nama_penyakit }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <a href="{{ route('penyakit.edit', ['penyakit' => $item->kode_penyakit]) }}" class="btn btn-info btn-sm mr-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('penyakit.destroy', ['penyakit' => $item->kode_penyakit]) }}" method="POST">
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