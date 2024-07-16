@extends('layouts.app')

@section('title', 'Hasil Diagnosa')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5" data-aos="fade-up">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="pagetitle text-center mb-4">
                    <h1><strong>Hasil Diagnosa</strong></h1>
                </div><!-- End Page Title -->

                <div class="section">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card mb-4 mt-3 shadow-sm">
                                <h3 class="card-header text-center bg-primary text-white">Biodata Pasien</h3>
                                <div class="card-body">
                                    <p><strong>Nama:</strong> {{ $pasien->nama_pasien }}</p>
                                    <p><strong>Umur:</strong> {{ $pasien->umur }}</p>
                                    <p><strong>Instansi:</strong> {{ $pasien->instansi }}</p>
                                </div>
                            </div>

                            <div class="card mb-4 mt-3 shadow-sm">
                                <h3 class="card-header text-center bg-primary text-white">Nilai Akhir Kriteria</h3>
                                <div class="card-body">
                                    @php
                                        $max_nilai = 0;
                                        $max_kriteria = '';
                                    @endphp

                                    @foreach ($nilai_akhir_kriteria as $kriteria => $nilai_akhir)
                                        <div class="mb-3">
                                            <h5 class="text-primary">{{ $kriteria }}</h5>
                                            <p>Nilai Akhir: <strong>{{ $nilai_akhir }}</strong></p>
                                        </div>

                                        @if ($nilai_akhir > $max_nilai)
                                            @php
                                                $max_nilai = $nilai_akhir;
                                                $max_kriteria = $kriteria;
                                            @endphp
                                        @endif
                                    @endforeach

                                    <div class="alert alert-info text-center">
                                        <strong>Kriteria dari Self-determination Terbesarmu adalah:</strong> {{ $max_kriteria }} (Nilai: {{ $max_nilai }})
                                    </div>
                                    <div class="alert alert-light">
                                        <strong>Deskripsi:</strong> {{ $deskripsi_kriteria[$max_kriteria] ?? 'Deskripsi tidak tersedia' }}
                                    </div>
                                    <div class="alert alert-warning text-center mt-4">
                                        <strong>Tingkat Self-determination :</strong> {{ number_format($presentase, 2) }} % ({{ $presentase <= 33 ? 'Rendah' : ($presentase <= 66 ? 'Sedang' : 'Tinggi') }})
                                    </div>
                                    <div class="alert alert-success text-center mt-4">
                                        <strong>Kategori Hasil:</strong> {{ $kategori }}
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ route('home') }}" class="btn btn-secondary me-2">Kembali</a>
                                    <a href="#" class="btn btn-warning me-2">Detail</a>
                                    <a href="{{ route('cetak-hasil', $pasien->id) }}" class="btn btn-success">Cetak Hasil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Section -->
            </div>
        </div>
    </div>
</div>
@endsection
