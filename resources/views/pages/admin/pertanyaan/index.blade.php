@extends('layouts.admin')

@section('content')

<div class="pagetitle">
      <h1>Data Pertanyaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Pertanyaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title ">Data Pertanyaan</h5>
                <a href="{{ route('pertanyaan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                  <i class="bi bi-plus-lg"></i> Pertanyaan</a>
              </div>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pertanyaan</th>
                        <th scope="col">Kode Pertanyaan</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Kode Kriteria</th>
                        <th scope="col">Kode Indikator</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($data as $index=>$item)
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{ $item->pertanyaan }}</td>
                        <td>{{ $item->kode_pertanyaan }}</td>
                        <td>{{ $item->indikator->nilai_pakar }}</td>
                        <td>{{ $item->kriteria->kode_kriteria }}</td>
                        <td>{{ $item->indikator->kode_indikator }}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('pertanyaan.edit', $item)}}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="btn btn-danger" onclick="deleteData('{{route('pertanyaan.delete', $item)}}')">
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