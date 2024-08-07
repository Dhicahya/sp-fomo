@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Data Indikator</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Indikator</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">Data Indikator</h5>
                            <a href="{{ route('indikator.create') }}"
                                class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="bi bi-plus-lg"></i> Indikator
                            </a>
                        </div>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Indikator</th>
                                        <th scope="col">Kode Indikator</th>
                                        <th scope="col">Kriteria</th>
                                        <th scope="col">Nilai Indikator</th>
                                        <th scope="col">Nilai Pakar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->kode_indikator }}</td>
                                            <td>{{ $item->kriteria->nama }} ({{ $item->kriteria->kode_kriteria }})</td>
                                            <td>{{ number_format($item->pv_indikator, 4) }}</td>
                                            <td>{{ number_format($item->nilai_pakar, 4) }}</td>
                                            <td>
                                                <a class="btn btn-success" href="{{ route('indikator.edit', $item) }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a class="btn btn-danger"
                                                    onclick="deleteData('{{ route('indikator.delete', $item) }}')">
                                                    <i class="bi bi-trash3"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
