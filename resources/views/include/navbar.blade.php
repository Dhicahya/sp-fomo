<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo d-flex align-items-center">
            <a href="{{ route('home') }}">
                <img src="/img/fomo-logo.png" alt="" class="img-fluid">
            </a>
            <h1>
                <a href="{{ route('home') }}">SPATIFOMO</a>
            </h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle py-0 d-flex align-items-center" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ '@' . auth()->user()->username }}</span>
                        @if (auth()->user()->image_path)
                        <img class="img-profile rounded-circle ms-2" src="/storage/{{ auth()->user()->image_path }}"
                            style="height: 35px; width: 35px; object-fit: cover;">
                        @else
                        <img class="img-profile rounded-circle ms-2" src="/img/undraw_profile.svg" style="height: 35px">
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person-fill me-2"></i> Profile
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
                @else
                <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                <li><a class="getstarted scrollto" href="{{ route('register') }}">Registrasi</a></li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>
