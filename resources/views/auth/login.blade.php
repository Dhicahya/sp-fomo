@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <!-- ======= Login Section ======= -->
    <section id="login" class="login">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center align-items-center">

                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="{{ asset('img/login-img.png') }}" alt="Login Image" class="img-fluid">
                </div>

                <div class="col-lg-6">
                    <div class="section-title text-center mb-4">
                        <h2><strong>Login</strong></h2>
                        <p>Masukkan informasi login Anda untuk mengakses akun Anda.</p>
                    </div>
                    <form action="{{ route('login') }}" method="post" role="form" data-aos="fade-up">
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
                            <input placeholder="Masukkan Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <input placeholder="Masukkan Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                    id="password" required autocomplete="current-password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link p-0 text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary btn-block col-lg-12">
                                <i class="fas fa-sign-in-alt"></i>
                                Login
                            </button>
                        </div>
                    </form>
                    <div class="text-center small">
                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang!</a></p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Login Section -->
</div>

@endsection
