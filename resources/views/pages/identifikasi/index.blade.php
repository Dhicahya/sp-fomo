@extends('layouts.app')

@section('title', 'Isi Identitas Pasien')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <section id="identitas-pasien" class="identitas-pasien">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center align-items-center mt-5">

                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="{{ asset('img/identitas.png') }}" alt="Identitas Pasien Image" class="img-fluid" height="50%">
                </div>

                <div class="col-lg-6">
                    <div class="section-title text-center mb-4">
                        <h2><strong>Isi Identitas Pasien</strong></h2>
                        <p>Masukkan informasi identitas pasien untuk melakukan diagnosa.</p>
                    </div>
                    <form action="{{ route('isi-identitas') }}" method="post" role="form" data-aos="fade-up">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="mb-3">
                            <input placeholder="Masukkan Nama" type="text" class="form-control @error('nama_pasien') is-invalid @enderror" name="nama_pasien"
                                id="nama_pasien" value="{{ old('nama_pasien') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <input placeholder="Masukkan Umur" type="number" class="form-control @error('umur') is-invalid @enderror" name="umur"
                                id="umur" value="{{ old('umur') }}" required>
                        </div>
                        <div class="mb-3">
                            <input placeholder="Masukkan Instansi" class="form-control @error('instansi') is-invalid @enderror" name="instansi"
                                id="instansi" required>{{ old('instansi') }}</input>
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary-custom btn-block col-lg-12">
                                Lakukan Tes
                            </button>
                        </div>
                    </form>
                    <div class="text-center small">
                        <p><a href="{{ route('home') }}">Kembali ke Home</a></p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Identitas Pasien Section -->
</div>

@endsection
