@extends('layouts.admin')

@section('title', 'Edit Solusi')

@section('content')
    <div class="pagetitle">
        <h1>Edit Index Random</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('indexRandom.index') }}">Index Random</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
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
                        <form action="{{ route('indexRandom.update', $indexRandom) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Matriks</label>
                                <input type="text" name="jumlah" class="form-control" id="jumlah"
                                    value="{{ $indexRandom->jumlah }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nilai" class="form-label">Nilai IR</label>
                                <input type="text" name="nilai" class="form-control" id="nilai"
                                    value="{{ $indexRandom->nilai }}" required>
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
