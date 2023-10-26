@extends('template')

@section('title')
    Edit Data Aturan | Aplikasi Sistem Pakar Diagnosa Penyakit DBD dan Thypoid
@endsection

@section('pageHeading')
    Edit Data Aturan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('aturan.update', ['aturan' => $aturan->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id">Kode Aturan</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $aturan->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="kode_penyakit">Kode Penyakit</label>
                    <select class="form-control" id="kode_penyakit" name="kode_penyakit">
                        @foreach($penyakit as $item)
                            <option value="{{ $item->kode_penyakit }}" {{ $item->kode_penyakit == $aturan->kode_penyakit ? 'selected' : '' }}>
                                {{ $item->nama_penyakit }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode_gejala">Kode Gejala</label>
                    <select class="form-control multiple-select" id="kode_gejala" name="kode_gejala[]" multiple>
                        @foreach($gejala as $item)
                            <option value="{{ $item->kode_gejala }}" {{ in_array($item->kode_gejala, explode(',', $aturan->kode_gejala)) ? 'selected' : '' }}>
                                {{ $item->nama_gejala }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="hasil_lab">Hasil Lab</label>
                    <select class="form-control multiple-select" id="hasil_lab" name="hasil_lab[]" multiple>
                        @foreach($hasil_lab as $item)
                            <option value="{{ $item->kode_gejala }}" {{ in_array($item->kode_gejala, explode(',', $aturan->hasil_lab)) ? 'selected' : '' }}>
                                {{ $item->nama_gejala }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode_gejalaPD">Kode Gejala Pemeriksaan</label>
                    <select class="form-control multiple-select" id="kode_gejalaPD" name="kode_gejalaPD[]" multiple>
                        @foreach($gejalaPD as $item)
                            <option value="{{ $item->kode_gejala }}" {{ in_array($item->kode_gejala, explode(',', $aturan->kode_gejalaPD)) ? 'selected' : '' }}>
                                {{ $item->nama_gejala }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.multiple-select').select2();
        });
    </script>
@endsection
