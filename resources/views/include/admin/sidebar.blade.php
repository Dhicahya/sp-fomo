<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Kelola Admin</li>
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.index') }}">
                <i class="bi bi-people"></i>
                <span>Kelola Data Pengguna</span>
            </a>
        </li><!-- End Kelola Data Pengguna Page Nav -->
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-clock-history"></i>
                <span>Riwayat Tes</span>
            </a>
        </li><!-- End Riwayat Tes Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Basis Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('kriteria.index') }}">
                        <i class="bi bi-circle"></i><span>Kelola Kriteria</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('relkriteria.index') }}">
                        <i class="bi bi-circle"></i><span>Analisis Kriteria</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('indikator.index') }}">
                        <i class="bi bi-circle"></i><span>Kelola Indikator</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('relindikator.index') }}">
                        <i class="bi bi-circle"></i><span>Analisis Indikator</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Basis Data Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('pertanyaan.index') }}">
                <i class="bi bi-question-circle"></i>
                <span>Kelola Data Pertanyaan</span>
            </a>
        </li><!-- End Kelola Data Pertanyaan Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('solusi.index') }}">
                <i class="bi bi-lightbulb"></i>
                <span>Kelola Kategori dan Solusi</span>
            </a>
        </li><!-- End Kelola Kategori dan Solusi Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
