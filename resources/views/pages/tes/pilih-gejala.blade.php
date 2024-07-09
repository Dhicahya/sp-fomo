@extends('layouts.app')

@section('content')

    <main id="main">

        <div class="card">
        <div class="text-center mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                style="fill: rgb(101, 101, 101);">
                <path
                    d="M19.649 5.286 14 8.548V2.025h-4v6.523L4.351 5.286l-2 3.465 5.648 3.261-5.648 3.261 2 3.465L10 15.477V22h4v-6.523l5.649 3.261 2-3.465-5.648-3.261 5.648-3.261z">
                </path>
            </svg>
            <h4 class="mt-3">Silakan Pilih Gejala Di Bawah Ini Untuk Melakukan Diagnosa</h4>
        </div>
        <hr>
        <div class="card-body">
            <form action="{{ route('pilih-gejala.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="row">
                    @foreach($pertanyaans as $pertanyaan)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <strong>{{ $pertanyaan->pertanyaan }}</strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaans[{{ $pertanyaan->id }}]" value="0.0" required>
                                        <label class="form-check-label">Tidak</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaans[{{ $pertanyaan->id }}]" value="0.2" required>
                                        <label class="form-check-label">Tidak Yakin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaans[{{ $pertanyaan->id }}]" value="0.4" required>
                                        <label class="form-check-label">Sedikit Yakin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaans[{{ $pertanyaan->id }}]" value="0.6" required>
                                        <label class="form-check-label">Cukup Yakin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaans[{{ $pertanyaan->id }}]" value="0.8" required>
                                        <label class="form-check-label">Yakin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaans[{{ $pertanyaan->id }}]" value="1.0" required>
                                        <label class="form-check-label">Sangat Yakin</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Diagnosa</button>
                </div>
            </form>
        </div>
    </div>

    </main><!-- End #main -->
@endsection
