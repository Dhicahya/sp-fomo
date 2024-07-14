@extends('layouts.admin')

@section('title', 'Tambah Solusi')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Index Random</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('indexRandom.index') }}">Index Random</a></li>
                <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Data</h5>
                        <!-- General Form Elements -->
                        <form action="{{ route('indexRandom.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Matriks</label>
                                <input type="number" name="jumlah" class="form-control"
                                    id="jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="nilai" class="form-label">Nilai IR</label>
                                <input type="number" step="0.01" name="nilai" class="form-control"
                                    id="nilai" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.container-fluid -->
@endsection
