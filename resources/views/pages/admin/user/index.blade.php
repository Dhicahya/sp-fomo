@extends('layouts.admin')

@section('title', 'User')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User</h1>
            <a href="/admin/user/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Tambah User</a>
        </div>

        <div class="card">
            <div class="card-body">
                <table id="dataTable" class="table table-striped table-bordered dataTables_length" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($data as $index => $item)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>
                                    @if ($item->image_path)
                                        <img src="/storage/{{ $item->image_path }}" style="height: 50px"
                                            alt="Profile Picture">
                                    @else
                                        <img src="/img/undraw_profile.svg" style="height: 50px" alt="Profile Picture">
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input onclick="window.location.href='{{ route('user.status', $item) }}'"
                                            {{ $item->status ? 'checked' : '' }} type="checkbox"
                                            class="custom-control-input" id="customSwitch{{ $index }}">
                                        <label class="custom-control-label" for="customSwitch{{ $index }}">
                                            {{ $item->status ? 'Available' : 'Not Available Now' }}
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('user.edit', $item) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger" onclick="deleteData('{{ route('user.delete', $item) }}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    {{-- <script>
        function deleteData(url) {
            if (confirm("Yakin?")) {
                window.location.href = url;
            }
        }
    </script> --}}
    <!-- /.container-fluid -->
@endsection
