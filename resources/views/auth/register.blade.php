@extends('layouts.app')

@section('title', 'Registrasi')

@section('content')
    <div class="container mt-5">
        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 my-5">
                    <div class="card mt-5 shadow">
                        <div class="card-body">
                            <h3 class="text-center font-weight-bold">Selamat Datang!</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('registerStore') }}">
                                @csrf
                                <div class="form-floating mt-5 mb-2">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                        placeholder="Nama" required>
                                    <label for="name">Nama</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}"
                                        placeholder="Username" required>
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                        placeholder="Email" required>
                                    <label for="email">Email</label>
                                </div>
								<div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="instansi" name="instansi" value="{{ old('instansi') }}"
                                        placeholder="Instansi" required>
                                    <label for="instansi">Instansi</label>
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
                                <div class="input-group my-2">
                                    <input type="password" class="form-control" id="password-confirm"
                                        name="password_confirmation" placeholder="Konfirmasi Password" required
                                        autocomplete="new-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePasswordConfirm">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-4">
									<i class="bi bi-box-arrow-in-right"></i>Register
								</button>
                            </form>
                        </div>
                        <div class="text-center small">
                            <p>Sudah Punya akun? <a href="{{ route('login') }}">Login!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
