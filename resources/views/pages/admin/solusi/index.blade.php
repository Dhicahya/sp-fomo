@extends('layouts.admin')

@section('title', 'Solusi')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manajemen Solusi</h1>
                <a href="/admin/solusi/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Solusi</a>
        </div>

        <div class="card">
            <div class="card-body">
                <table id="SolusiTable" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Solusi</th>
                            <th scope="col">Bobot Range</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$item->kategori}}</td>
                        <td>{{$item->solusi}}</td>
                        <td>{{$item->bobot_kategori}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('solusi.edit', $item) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger" onclick="deleteData('{{ route('solusi.delete', $item) }}')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteData(url) {
            if (confirm("Yakin?")) {
                window.location.href = url;
            }
        }
    </script>
    <!-- /.container-fluid -->

@endsection
