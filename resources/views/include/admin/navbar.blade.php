  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
          <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
              <img src="{{ asset('/img/fomo-logo.png') }}" alt="">
              <span class="d-none d-lg-block">SPATIFOMO</span>
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">
              @auth
                  <li class="nav-item dropdown pe-3">
                      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                          data-bs-toggle="dropdown">
                          @if (auth()->user()->image_path)
                              <img src="/storage/{{ auth()->user()->image_path }}" alt="Profile" class="rounded-circle"
                                  style="height: 35px; width: 35px; object-fit: cover;">
                          @else
                              <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                          @endif
                          <span class="d-none d-md-block dropdown-toggle ps-2">{{ '@' . auth()->user()->username }}</span>
                      </a><!-- End Profile Iamge Icon -->

                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                          <li class="dropdown-header">
                              <h6>{{ '@' . auth()->user()->name }}</h6>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                  <i class="bi bi-house"></i>
                                  <span>Home Page</span>
                              </a>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                  <i class="bi bi-box-arrow-right"></i>
                                  <span>Sign Out</span>
                              </a>
                          </li>

                      </ul><!-- End Profile Dropdown Items -->
                  </li><!-- End Profile Nav -->
              @endauth

          </ul>
      </nav><!-- End Icons Navigation -->

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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i></button>
                <a class="btn btn-danger" href="{{ route('logout') }}"><i class="bi bi-check-lg"></i></a>
            </div>
        </div>
    </div>
</div>
  
