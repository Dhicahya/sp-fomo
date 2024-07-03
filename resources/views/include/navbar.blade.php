    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  header-transparent ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo d-flex align-items-center">
                <a href="{{ route('home') }}"><img src="/img/fomo-logo.png" alt="" class="img-fluid"></a>
                <h1><a href="{{ route('home') }}">SPATIFOMO</a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    @auth
                    <li class="nav-item dropdown no-arrow">
                          <a class="nav-link dropdown-toggle py-0" href="#" id="userDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span
                                  class="mr-2 d-none d-lg-inline text-gray-600 small">{{ '@'.(auth()->user()->username) }}</span>
                              @if (auth()->user()->image_path)
                              <img class="img-profile rounded-circle" src="/storage/{{auth()->user()->image_path}}" style="height: 35px; width: 35px; object-fit: cover;"> 
                              @else
                              <img class="img-profile rounded-circle" src="/img/undraw_profile.svg" style="height: 35px">
                              @endif
                          </a>
                          <!-- Dropdown - User Information -->
                          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item text-sm-start" href="#">
                                    <span>
                                        <i class="fas fa-user"></i>
                                        Profile
                                    </span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <span>
                                        <i class="fas fa-sign-out-alt"></i>
                                        Logout
                                    </span>
                                </a>
                            </div>
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
