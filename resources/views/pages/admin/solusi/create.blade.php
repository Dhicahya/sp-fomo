@extends('layouts.admin')

@section('title', 'Tambah Solusi')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('solusi.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" id="kategori" required>
                </div>
                <div class="mb-3">
                    <label for="solusi" class="form-label">Solusi</label>
                    <input type="text" name="solusi" class="form-control" id="solusi" required>
                </div>
                <div class="mb-3">
                    <label for="bobot_kategori" class="form-label">Bobot Kategori</label>
                    <input type="number" step="0.01" name="bobot_kategori" class="form-control" id="bobot_kategori" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection