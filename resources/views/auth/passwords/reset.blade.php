@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <!-- ======= Reset Password Section ======= -->
    <section id="reset-password" class="reset-password">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="{{ asset('img/reset-password.png') }}" alt="Reset Password Image" class="img-fluid" style="height: 80%">
                </div>

                <div class="col-lg-6">
                    <div class="section-title text-center mb-4">
                        <h2><strong>Reset Password</strong></h2>
                        <p>Masukkan informasi Anda untuk mereset password Anda.</p>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}" data-aos="fade-up">
                        @csrf
                        

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan Email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password" required autocomplete="new-password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary-custom btn-block col-lg-12">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End Reset Password Section -->
</div>
@endsection
