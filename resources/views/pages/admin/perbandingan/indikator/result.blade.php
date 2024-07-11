@extends('layouts.admin')

@section('content')

<div class="pagetitle">
    <h1>Hasil Perhitungan Indikator</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Hasil Perhitungan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <!-- Matriks Perbandingan Berpasangan Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Matriks Perbandingan Berpasangan</h5>
                    </div>

                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Indikator</th>
                                    @foreach ($indikators as $indikator)
                                        <th>{{ $indikator->kode_indikator }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @for ($x = 0; $x < $n; $x++)
                                    <tr>
                                        <td>{{ $indikators[$x]->kode_indikator }}</td>
                                        @for ($y = 0; $y < $n; $y++)
                                            <td>{{ number_format($matrik[$x][$y], 3) }}</td>
                                        @endfor
                                    </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <tr class="table-light">
                                    <th>Jumlah</th>
                                    @for ($i = 0; $i < $n; $i++)
                                        <th>{{ number_format($jmlmpb[$i], 3) }}</th>
                                    @endfor
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div><!-- End Matriks Perbandingan Berpasangan Card -->

            <!-- Matriks Nilai Penyakit Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Matriks Nilai Indikator</h5>
                    </div>

                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Indikator</th>
                                    @foreach ($indikators as $indikator)
                                        <th>{{ $indikator->kode_indikator }}</th>
                                    @endforeach
                                    <th>Jumlah</th>
                                    <th>Priority Vector</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($x = 0; $x < $n; $x++)
                                    <tr>
                                        <td>{{ $indikators[$x]->kode_indikator }}</td>
                                        @for ($y = 0; $y < $n; $y++)
                                            <td>{{ number_format($matrikb[$x][$y], 3) }}</td>
                                        @endfor
                                        <td>{{ number_format($jmlmnk[$x], 3) }}</td>
                                        <td>{{ number_format($pv[$x], 3) }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <tr class="table-light">
                                    <th colspan="{{ $n + 2 }}">Principe Eigen Vector (λ maks)</th>
                                    <th>{{ number_format($eigenvektor, 3) }}</th>
                                </tr>
                                <tr class="table-light">
                                    <th colspan="{{ $n + 2 }}">Consistency Index</th>
                                    <th>{{ number_format($consIndex, 3) }}</th>
                                </tr>
                                <tr class="table-light">
                                    <th colspan="{{ $n + 2 }}">Consistency Ratio</th>
                                    <th>{{ number_format($consRatio * 100, 3) }} %</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                    @if ($consRatio > 0.1)
                        <div class="alert alert-danger mt-4" role="alert">
                            <h5 class="alert-heading">Nilai Consistency Ratio melebihi 10% !!!</h5>
                            <p>Mohon input kembali tabel perbandingan...</p>
                        </div>
                        <a href='javascript:history.back()' class="btn btn-primary">
                            <i class="bx bx-arrow-back"></i> Kembali
                        </a>
                    @else
                        <a href="{{ route('relindikator.index') }}" class="btn btn-primary mt-4" style="float: right;">
                            Lanjut <i class="bx bx-arrow-right"></i>
                        </a>
                    @endif

                </div>
            </div><!-- End Matriks Nilai Penyakit Card -->

        </div>
    </div>
</section>

@endsection
