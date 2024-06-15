@extends('layouts.admin')

@section('title', 'Edit Solusi')

@section('content')
    <div class="pagetitle">
        <h1>Edit Kategori dan Solusi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('solusi.index') }}">Kategori dan Solusi</a></li>
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
                        <form action="{{ route('solusi.update', $solusi) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" name="kategori" class="form-control" id="kategori"
                                    value="{{ $solusi->kategori }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="solusi" class="form-label">Solusi</label>
                                <input type="text" name="solusi" class="form-control" id="solusi"
                                    value="{{ $solusi->solusi }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="bobot_kategori" class="form-label">Bobot Kategori</label>
                                <input type="text" name="bobot_kategori" class="form-control" id="bobot_kategori"
                                    value="{{ $solusi->bobot_kategori }}" required>
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
