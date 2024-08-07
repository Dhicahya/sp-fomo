@extends('layouts.app')

@section('title', 'Pilih Gejala')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <section id="pilih-gejala" class="pilih-gejala">
            <div class="container" data-aos="fade-up">
                <div class="section-title text-center mb-4">
                    <h2><strong>Pilih Gejala</strong></h2>
                    <p>Silakan pilih gejala di bawah ini untuk melakukan diagnosa.</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form action="{{ route('proses-identifikasi') }}" method="post" role="form" data-aos="fade-up">
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
                            <input type="hidden" name="pasien_id" value="{{ $pasien->id }}">
                            <div class="row">
                                {{-- @foreach ($pertanyaans as $pertanyaan) --}}
                                {{-- <h3>
                                </h3> --}}
                                @foreach ($pertanyaans as $pertanyaan)
                                <div class="col-md-6 mb-4">
                                    <p>{{ $pertanyaan->kriteria->nama }}</p>
                                    <div class="card">
                                        <div class="card-header">
                                                <strong>{{ $loop->iteration }}. {{ $pertanyaan->pertanyaan }}</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="pertanyaans[{{ $pertanyaan->id }}]" value="0.16" id="0.16{{ $pertanyaan->id }}" required>
                                                    <label class="form-check-label" for="0.16{{ $pertanyaan->id }}">Saya tidak bisa melakukannya walaupun dengan dukungan</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="pertanyaans[{{ $pertanyaan->id }}]" value="0.33" id="0.33{{ $pertanyaan->id }}" required>
                                                    <label class="form-check-label" for="0.33{{ $pertanyaan->id }}">Saya tidak bisa melakukannya karena tidak ada kesempatan.</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="pertanyaans[{{ $pertanyaan->id }}]" value="0.5" id="0.5{{ $pertanyaan->id }}" required>
                                                    <label class="form-check-label" for="0.5{{ $pertanyaan->id }}">Saya tidak bisa melakukannya sendiri.</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="pertanyaans[{{ $pertanyaan->id }}]" value="0.67" id="0.67{{ $pertanyaan->id }}" required>
                                                    <label class="form-check-label" for="0.67{{ $pertanyaan->id }}">Saya melakukannya dengan dukungan.</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="pertanyaans[{{ $pertanyaan->id }}]" value="0.83" id="0.83{{ $pertanyaan->id }}" required>
                                                    <label class="form-check-label" for="0.83{{ $pertanyaan->id }}">Saya melakukannya jika mereka memberi saya kesempatan.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="pertanyaans[{{ $pertanyaan->id }}]" value="1.0" id="1.0{{ $pertanyaan->id }}" required>
                                                    <label class="form-check-label" for="1.0{{ $pertanyaan->id }}">Saya bisa melakukannya sendiri.</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-diagnoses"></i> Diagnosa
                                </button>
                            </div>
                        </form>
                        <div class="text-center small">
                            <p><a href="{{ route('home') }}">Kembali ke Home</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
