@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Hasil Diagnosa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Hasil Diagnosa</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hasil Diagnosa untuk {{ $pasien->nama_pasien }}</h5>

                    @foreach ($nilai_akhir_kriteria as $kriteria => $nilai_akhir)
                        <h6 class="mt-4">{{ $kriteria }}</h6>
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
</section>

@endsection
