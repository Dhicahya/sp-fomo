@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Index Random</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Index Random</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title ">Index Random</h5>
                            <a href="{{ route('indexRandom.create') }}"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="bi bi-plus-lg"></i> RI</a>
                        </div>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Matriks</th>
                                        <th scope="col">Nilai RI</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ $item->nilai }}</td>
                                            <td>
                                                <a class="btn btn-success" href="{{ route('indexRandom.edit', $item) }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a class="btn btn-danger"
                                                    onclick="deleteData('{{ route('indexRandom.delete', $item) }}')">
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
