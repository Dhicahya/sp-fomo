@extends('layouts.admin')

@section('title', 'Edit Pertanyaan')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Kriteria</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pertanyaan.index') }}">Kriteria</a></li>
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
                        <form action="{{ route('pertanyaan.update', $pertanyaan) }}" method="POST"
                            enctype="multipart/form-data">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kriteria_id" class="form-label">Kriteria</label>
                                <select name="kriteria_id" id="kriteria_id" class="form-select" required>
                                    <option value="" selected disabled>-- Pilih Kriteria --</option>
                                    @foreach ($kriteria as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="indikator_id" class="form-label">Indikator</label>
                                <select name="indikator_id" id="indikator_id" class="form-select" required>
                                    <option value="" selected disabled>-- Pilih Indikator --</option>
                                    @foreach ($indikator as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <input type="text" name="pertanyaan" class="form-control" id="pertanyaan"
                                    value="{{ $pertanyaan->pertanyaan }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kode_pertanyaan" class="form-label">Kode Pertanyaan</label>
                                <input type="text" name="kode_pertanyaan" class="form-control" id="kode_pertanyaan"
                                    value="{{ $pertanyaan->kode_pertanyaan }}" required>
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
