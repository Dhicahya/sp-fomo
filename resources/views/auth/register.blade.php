@extends('layouts.app')

@section('title', 'Registrasi')

@section('content')
    <div class="d-flex justify-content-center align-items-center my-5 vh-100" data-aos="fade-up">
        <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="section-title text-center mb-4">
                    <h2><strong>Registrasi</strong></h2>
                    <p>Silakan isi formulir registrasi untuk membuat akun baru.</p>
                </div>
                <form method="POST" action="{{ route('registerStore') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Nama" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ old('username') }}" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Email" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="instansi" name="instansi"
                            value="{{ old('instansi') }}" placeholder="Instansi" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan Password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                            placeholder="Konfirmasi Password" required autocomplete="new-password">
                        <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-primary-custom btn-block col-lg-12">
                            Registrasi
                        </button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p class="fs-6">Sudah Punya akun? <a href="{{ route('login') }}">Login!</a></p>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="{{ asset('img/register-img.png') }}" alt="Registration Image" class="img-fluid">
            </div>
        </div>
    </div>
    </div>
@endsection
