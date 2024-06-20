@extends('layouts.admin')

@section('title', 'Edit Kriteria')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Kriteria</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
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
                        <form action="{{ route('kriteria.update', $kriterium) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Kriteria</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ $kriterium->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
                                <input type="text" name="kode_kriteria" class="form-control" id="kode_kriteria"
                                    value="{{ $kriterium->kode_kriteria }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" rows="5" cols="50"   
                                    required>{{ $kriterium->deskripsi }}</textarea>
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
