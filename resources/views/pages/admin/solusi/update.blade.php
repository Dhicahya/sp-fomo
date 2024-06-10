@extends('layouts.admin')

@section('title', 'Edit Solusi')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Solusi</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('solusi.update', $solusi)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" id="kategori" value="{{$solusi->kategori}}" required>
                </div>
                <div class="mb-3">
                    <label for="solusi" class="form-label">Solusi</label>
                    <input type="text" name="solusi" class="form-control" id="solusi" value="{{$solusi->solusi}}" required>
                </div>
                <div class="mb-3">
                    <label for="bobot_kategori" class="form-label">Bobot Kategori</label>
                    <input type="text" name="bobot_kategori" class="form-control" id="bobot_kategori" value="{{$solusi->bobot_kategori}}" required>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection