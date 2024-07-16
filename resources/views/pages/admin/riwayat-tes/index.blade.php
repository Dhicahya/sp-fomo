@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Riwayat Tes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Riwayat Tes</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title ">Riwayat Tes</h5>
                            {{-- <a href="{{ route('user.create') }}"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="bi bi-plus-lg"></i> User</a> --}}
                        </div>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Usia</th>
                                        <th scope="col">Kriteria</th>
                                        <th scope="col">Hasil Tes</th>
                                        <th scope="col">Persentase</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Tanggal Tes</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien as $index)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $index->nama_pasien }}</td>
                                            <td>{{ $index->umur }}</td>
                                            <td>{{ $index->kriteria_id }}</td>
                                            <td>{{ $index->hasil_tes }}</td>
                                            <td>{{ $index->presentasi }}%</td>
                                            <td>{{ $index->solusi->solusi ?? 'tidak tersedia' }}</td>
                                            <td>{{ $index->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <a class="btn btn-success" href="">
                                                    <i class="bi bi-search"></i>
                                                </a>
                                                <a class="btn btn-danger"
                                                    onclick="deleteData('{{ route('pasien.delete', $index) }}')">
                                                    <i class="bi bi-trash3"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
