@extends('layouts.admin')

@section('title', 'Edit Kriteria')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Kriteria</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('indikator.index') }}">Kriteria</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>
                        <!-- General Form Elements -->
                        <form action="{{ route('indikator.update', $indikator) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Indikator</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ $indikator->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kode_indikator" class="form-label">Kode Indikator</label>
                                <input type="text" name="kode_indikator" class="form-control" id="kode_indikator"
                                    value="{{ $indikator->kode_indikator }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nilai_pakar" class="form-label">Nilai Pakar</label>
                                <input type="text" name="nilai_pakar" class="form-control" id="nilai_pakar"
                                    value="{{ $indikator->nilai_pakar }}">
                            </div>
                            <div class="mb-3">
                                <label for="kriteria_id" class="form-label">Kriteria</label>
                                <select name="kriteria_id" id="kriteria_id" class="form-select" required>
                                    <option value="" selected disabled>-- Pilih Kriteria --</option>
                                    @foreach ($kriteria as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.container-fluid -->
@endsection
