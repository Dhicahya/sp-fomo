@extends('layouts.app')

@section('title', 'Isi Identitas Pasien')

@section('content')
@extends('admin.layouts.main')

@section('content')

<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> 
    </h4>

    <!-- Biodata Pasien -->
    <div class="card mb-4">
        <h3 class="card-header mx-3">Biodata Pasien</h3>
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <td width="150px">Nama</td>
                    <td>: {{ $pasien->nama_pasien }}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>: {{ $pasien->umur }}</td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td>: {{ $pasien->instansi }}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Hasil Diagnosis dan 3 Hasil Diagnosa Teratas -->
    <div class="card mb-4 p-4">
        <h3 class="card-header text-center mb-3">Hasil Diagnosa</h3>
        <div class="card-body">
            <!-- Bagian Hasil Diagnosis -->
            @if (session()->has('invalid_diagnosis') && session('invalid_diagnosis') == true)
            <div class="alert alert-warning text-center">
                <h4>Hasil tidak valid</h4>
                <p>Silakan untuk melakukan Identifikasi ulang!</p>
            </div>
            <div class="text-center mb-4">
                <a href="#" class="btn btn-warning">Diagnosa Ulang</a>
            </div>
            @else
            <div class="row mb-4">
                {{-- @foreach ($hasil_diagnosa as $index => $hasil)
                @php
                $colClass = '';
                if (count($hasil_diagnosa) == 1) {
                $colClass = 'col-md-12';
                } elseif (count($hasil_diagnosa) == 2) {
                $colClass = 'col-md-6';
                } else {
                $colClass = 'col-md-4';
                } --}}
                @endphp
                <div class="#">
                    <div class="card mb-5 border">
                        <div class="card-body text-center">
                            <h1 class="card-text">{{ $hasil['persentasi'] }}%</h1>
                            <h5 class="card-title">{{ $hasil['solusi'] }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                <h3 class="text-center">Tingkat Kendali dirimu <b><u>{{ $pasien->kriteria->nama}}</u></b> Sebesar <b>{{ $pasien->presentasi }}%</b></h3>
            </div>

            <!-- Deskripsi dan Penanganan -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3 border">
                        <h5 class="card-header">Deskripsi</b></h5>
                        <div class="card-body">
                            <p>{{ $pasien->solusi->kategori }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gejala yang Dipilih -->
            <div class="card mb-5 border">
                <h5 class="card-header">Gejala yang Dipilih</h5>
                <div class="card-body">
                    <ul>
                        @foreach ($pertanyaan as $g)
                        <li>{{ $g->pertanyaan->pertanyaan }} (Nilai User: {{ $g->nilai_user }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="text-center mb-2">
                {{-- <a href="{{ route('admin.diagnosa.cetak', $pasien->id) }}" target="_blank" class="btn btn-primary"><i class='bx bx-printer'></i> Cetak</a> --}}
                <a href="#" class="btn btn-warning"><i class='bx bx-arrow-back'></i> Selesai</a>
            </div>
            
            @endif
        </div>
    </div>
</div>

@endsection

@endsection