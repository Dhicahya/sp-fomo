@extends('layouts.admin')

@section('content')

<div class="pagetitle">
      <h1>Manajemen Data Pengguna</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Pengguna</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title ">Data Pengguna</h5>
                <a href="{{ route('user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                  <i class="bi bi-plus-lg"></i> User</a>
              </div>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($data as $index=>$item)
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>
                            @if ($item->image_path)
                                <img src="/storage/{{ $item->image_path }}" style="height: 50px" alt="Profile Picture">
                            @else
                                <img src="/img/undraw_profile.svg" style="height: 50px" alt="Profile Picture">
                            @endif
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('user.edit', $item)}}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="btn btn-danger" onclick="deleteData('{{route('user.delete', $item)}}')">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection