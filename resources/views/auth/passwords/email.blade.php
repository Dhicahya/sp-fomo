@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <!-- ======= Send Password Reset Link Section ======= -->
    <section id="send-password-reset-link" class="send-password-reset-link">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="{{ asset('img/send-email.png') }}" alt="Send Password Reset Link Image" class="img-fluid">
                </div>

                <div class="col-lg-6">
                    <div class="section-title text-center mb-4">
                        <h2><strong>Reset Password</strong></h2>
                        <p>Masukkan email Anda untuk mengirim tautan reset password.</p>
                    </div>
                    <form method="POST" action="{{ route('password.email') }}" data-aos="fade-up">
                        @csrf

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary btn-block col-lg-12">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End Send Password Reset Link Section -->
</div>
@endsection
