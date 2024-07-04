@extends('layouts.profil')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 my-5">
                <div class="card">
                    <div class="card-header text-white"
                        style="background-image: radial-gradient(circle at 50% -20.71%, #2affff 0, #46adf9 50%, #2e4d6e 100%)">
                        <h5 class="mb-0">PROFIL</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                @if ($user->image_path)
                                    <img src="/storage/{{ $user->image_path }}" alt="Profile Picture" class="rounded-circle mb-3"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <img src="/img/undraw_profile.svg" alt="Profile Picture" class="rounded-circle mb-3"
                                        style="width: 150px; height: 150px;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <h4 class="mb-2">{{ $user->name }}</h4>
                                <p class="text-muted mb-2">{{ '@' . $user->username }}</p>
                                <p class="text-muted mb-2">{{ $user->email }}</p>
                                <p class="text-muted mb-3">{{ $user->instansi }}</p>
                                <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#editProfileModal">
                                    Edit Profil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3>Riwayat Tes</h3>
        <hr style="height: 3px; background-color: black; border-radius: 5px;">
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profilStore') }}" method="POST" enctype="multipart/form-data">
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
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="inputName">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $user->username }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputInstansi">Instansi</label>
                            <input type="text" class="form-control" id="instansi" name="instansi"
                                value="{{ $user->instansi }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputConfirmPassword">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password-confirm"
                                name="password_confirmation" placeholder="Konfirmasi Password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputProfilePicture">Foto Profil</label>
                            <input type="file" name="image_path" class="form-control">
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
