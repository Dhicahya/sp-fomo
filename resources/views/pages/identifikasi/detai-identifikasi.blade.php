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
                            <div class="card mb-4 mt-3">
                                <h3 class="card-header">Biodata Pasien</h3>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="150px">Nama</td>
                                            <td>: {{ $pasien->nama_pasien }}</td>
                                        </tr>
                                        <tr>
                                            <td>Usia</td>
                                            <td>: {{ $pasien->umur }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>: {{ $pasien->instansi }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Hasil Diagnosa untuk {{ $pasien->nama_pasien }}</h5>
                                    @foreach ($nilai_akhir_kriteria as $kriteria => $nilai_akhir)
                                        <h3 class="mt-4">{{ $kriteria }}</h3>
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Kode Gejala</th>
                                                    <th scope="col">Nilai Pakar (H)</th>
                                                    <th scope="col">Nilai User (E)</th>
                                                    <th scope="col">Nilai Semesta P(Hi)</th>
                                                    <th scope="col">ΣHi P(E|Hi) * P(Hi)</th>
                                                    <th scope="col">P(Hi|E)</th>
                                                    <th scope="col">Hasil Diagnosa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identifikasi_by_kriteria[$kriteria] as $index => $item)
                                                    @php
                                                        $total_pakar = $total_sementara_by_kriteria[$kriteria];
                                                        $total_sementara = $total_sementara_by_kriteria[$kriteria];

                                                        $nilai_semesta = $total_pakar != 0 ? $item->pertanyaan->indikator->nilai_pakar / $total_pakar : 0;
                                                        $nilai_sementara = $item->pertanyaan->indikator->nilai_pakar * $item->nilai_user;
                                                        $p_hi_e = $total_sementara != 0 ? $nilai_sementara / $total_sementara : 0;
                                                    @endphp
                                                    <tr>
                                                        <th scope="row">{{ $index + 1 }}</th>
                                                        <td>{{ $item->pertanyaan->kode_pertanyaan }}</td>
                                                        <td>{{ $item->pertanyaan->indikator->nilai_pakar }}</td>
                                                        <td>{{ $item->nilai_user }}</td>
                                                        <td>{{ $nilai_semesta }}</td>
                                                        <td>{{ $nilai_sementara }}</td>
                                                        <td>{{ $p_hi_e }}</td>
                                                        <td>{{ $item->nilai_hasil }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <h6 class="mt-4">Nilai Akhir Kriteria {{ $kriteria }}: {{ $nilai_akhir }}</h6>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
