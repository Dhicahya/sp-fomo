@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5 vh-100">
    <!-- ======= Login Section ======= -->
    <section id="login" class="login my-5">
        <div class="container" data-aos="fade-up">

            <div class="row d-flex justify-content-center align-items-center">

                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="{{ asset('img/login-img.png') }}" alt="Login Image" class="img-fluid">
                </div>

                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h2><strong>Login</strong></h2>
                        <p>Masukkan informasi login Anda untuk mengakses akun Anda.</p>
                    </div>
                    <form action="{{ route('loginStore') }}" method="post" role="form" data-aos="fade-up">
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
                        <div class="form-group mt-3">
                            <input placeholder="Masukkan Email" type="email" class="form-control" name="email"
                                id="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <div class="input-group">
                                <input placeholder="Masukkan Password" type="password" class="form-control" name="password"
                                    id="password" required>
                                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <button type="submit" class="btn btn-primary-custom btn-block col-lg-12">
                                <i class="fas fa-sign-in-alt"></i>
                                Login
                            </button>
                        </div>
                    </form>
                    <div class="text-center small mt-2">
                        <p>Belum Punya akun? <a href="{{ route('register') }}">Daftar Sekarang!</a></p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Login Section -->
</div>

@endsection

