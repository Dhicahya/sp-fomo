@extends('layouts.admin')

@section('content')

<div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

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
                        <td>{{ $item->bobot }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('solusi.edit', $item)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger" onclick="deleteData('{{route('solusi.delete', $item)}}')">
                                <i class="fas fa-trash-alt"></i>
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