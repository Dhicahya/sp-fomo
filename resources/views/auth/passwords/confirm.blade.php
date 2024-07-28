@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <!-- ======= Confirm Password Section ======= -->
    <section id="confirm-password" class="confirm-password">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="{{ asset('img/confirm-password.png') }}" alt="Confirm Password Image" class="img-fluid">
                </div>

                <div class="col-lg-6">
                    <div class="section-title text-center mb-4">
                        <h2><strong>Confirm Password</strong></h2>
                        <p>{{ __('Please confirm your password before continuing.') }}</p>
                    </div>
                    <form method="POST" action="{{ route('password.confirm') }}" data-aos="fade-up">
                        @csrf

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password" required autocomplete="current-password">
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

                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary btn-block col-lg-12">
                                {{ __('Confirm Password') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End Confirm Password Section -->
</div>
@endsection