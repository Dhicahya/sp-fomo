@extends('layouts.admin')

@section('content')

<div class="pagetitle">
      <h1>Manajemen Kategori dan Solusi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Kategori dan Solusi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Kategori dan Solusi</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Solusi</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($data as $index=>$item)
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$item->kategori}}</td>
                        <td>{{ $item->solusi }}</td>
                        <td>{{ $item->bobot_kategori }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('solusi.edit', $item)}}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="btn btn-danger" onclick="deleteData('{{route('solusi.delete', $item)}}')">
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