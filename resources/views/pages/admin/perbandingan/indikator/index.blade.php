@extends('layouts.admin')

@section('content')

    <div class="pagetitle">
        <h1>Data Indikator</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Basis Pengetahuan</li>
                <li class="breadcrumb-item active">Analisis Hierarki Indikator</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">Perbandingan Indikator</h5>
                        </div>

                        <form action="{{ route('relindikator.store') }}" method="POST">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th colspan="2">Pilih yang lebih penting</th>
                                            <th>Nilai perbandingan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $urut = 0;
                                        @endphp

                                        @for ($x = 0; $x < count($indikators) - 1; $x++)
                                            @for ($y = $x + 1; $y < count($indikators); $y++)
                                                @php
                                                    $urut++;
                                                    $nilai =
                                                        \App\Models\Rel_indikator::where('indikator1', $indikators[$x]->id)
                                                            ->where('indikator2', $indikators[$y]->id)
                                                            ->first()->nilai ?? 1;
                                                @endphp

                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="pilih{{ $urut }}" value="1" id="pilih{{ $urut }}1" checked>
                                                            <label class="form-check-label" for="pilih{{ $urut }}1">
                                                                {{ $indikators[$x]->nama }} ({{ $indikators[$x]->kode_indikator }})
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="pilih{{ $urut }}" value="2" id="pilih{{ $urut }}2">
                                                            <label class="form-check-label" for="pilih{{ $urut }}2">
                                                                {{ $indikators[$y]->nama }} ({{ $indikators[$y]->kode_indikator }})
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" name="bobot{{ $urut }}" value="{{ $nilai }}" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endfor
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary mt-3" type="submit" name="submit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection