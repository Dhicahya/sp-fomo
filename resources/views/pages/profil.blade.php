@extends('layouts.app')

@section('content')
    <div class="container mt-5 min-vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 my-5">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #5777ba;">
                        <h5 class="mb-0">PROFIL</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                @if ($user->image_path)
                                    <img src="/storage/{{ $user->image_path }}" alt="Profile Picture" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <img src="/img/undraw_profile.svg" alt="Profile Picture" class="rounded-circle mb-3" style="width: 150px; height: 150px;">
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
                                <button type="button" class="btn btn-primary-custom rounded-pill" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                    Edit Profil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="">Riwayat Tes ({{ $user->pasien->count() }})</h3>
        <hr style="height:3px;background-color:black; border-radius:5px;">
        
        @if ($user->pasien->count())
            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Kriteria</th>
                            <th scope="col">Hasil Tes</th>
                            <th scope="col">Persentase</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Tanggal Tes</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->pasien as $index)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $index->nama_pasien }}</td>
                                <td>{{ $index->umur }}</td>
                                <td>{{ $index->kriteria_id }}</td>
                                <td>{{ $index->hasil_tes }}</td>
                                <td>{{ $index->presentasi }}%</td>
                                <td>{{ $index->solusi->solusi ?? 'tidak tersedia' }}</td>
                                <td>{{ $index->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('hasil-diagnosa', $index->id) }}">
                                        <i class="bi bi-search"></i>
                                    </a>
                                    <a class="btn btn-danger"
                                        onclick="deleteData('{{ route('pasien.delete', $index->id) }}')">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="container mt-5">
                <div class="my-5">
                    <div class="mt-5">
                        <p class="text-center fs-3">Tidak Ada Riwayat Tes</p>
                    </div>
                </div>
            </div>
        @endif
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
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputConfirmPassword">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Konfirmasi Password">
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
