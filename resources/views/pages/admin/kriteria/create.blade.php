@extends('layouts.admin')

@section('title', 'Tambah Kriteria')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Kriteria</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('solusi.index') }}">Kriteria</a></li>
                <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Kriteria</h5>
                        <!-- General Form Elements -->
                        <form action="{{ route('kriteria.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Kriteria</label>
                                <input type="text" name="nama" class="form-control" id="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
                                <input type="text" name="kode_kriteria" class="form-control" id="kode_kriteria" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea type="text" name="deskripsi" class="form-control" rows="5" cols="50" id="deskripsi" required></textarea>
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
