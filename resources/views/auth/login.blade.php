@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 my-5">
                    <div class="card mt-5 shadow">
                        <div class="card-body">
                            <h3 class="text-center font-weight-bold">Login</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('loginStore') }}" class="php-email-forum">
                                @csrf
                                <div class="form-floating mt-5 mb-2">
                                    <input type="email" class="form-control" id="email"name="email"
                                        placeholder="Masukkan Email" value="{{ old('email') }}" required>
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-group my-2">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Masukkan Password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePassword">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-block col-lg-12">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="text-center small">
                            <p>Belum Punya akun? <a href="{{ route('register') }}">Daftar Sekarang!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
