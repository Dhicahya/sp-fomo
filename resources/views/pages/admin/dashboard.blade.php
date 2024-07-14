@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <a href="{{ route('user.index') }}">

                        <div class="card-body">
                            <h5 class="card-title">Users</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\User::count() }}</h6>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                    <a href="{{ route('kriteria.index') }}">

                        <div class="card-body">
                            <h5 class="card-title">Kriteria</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-list-task"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\kriteria::count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">
                    <a href="{{ route('indikator.index') }}">
                        <div class="card-body">
                            <h5 class="card-title">Indikator</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-list-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\Indikator::count() }}</h6>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>

            </div><!-- End Customers Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <a href="{{ route('pertanyaan.index') }}">

                        <div class="card-body">
                            <h5 class="card-title">Pertanyaan</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-question-circle"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\Pertanyaan::count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <a href="{{ route('solusi.index') }}">

                        <div class="card-body">
                            <h5 class="card-title">Kategori dan Solusi</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-lightbulb"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\Solusi::count() }}</h6>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
            </div><!-- End Sales Card -->

                        <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">
                    <a href="{{ route('indexRandom.index') }}">
                        <div class="card-body">
                            <h5 class="card-title">Index Random</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-earmark-bar-graph"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\IndexRandom::count() }}</h6>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>

            </div><!-- End Customers Card -->

        </div>
    </section>
@endsection
