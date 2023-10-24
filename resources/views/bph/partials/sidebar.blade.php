<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">SIM HKI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('asset') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('user')->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item {{ request()->is('bph/data-pendeta','bph/data-wijk','bph/data-sintua','bph/data-sintua','bph/data-kartu-keluarga','bph/data-jemaat') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('bph/data-pendeta') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/data-pendeta') ? 'active' : '' }}"
                                href="/bph/data-pendeta">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendeta</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/data-wijk', 'bph/data-wijk-anggota-wijk-') ? 'active' : '' }} "
                                href="/bph/data-wijk">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Wijk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/data-sintua') ? 'active' : '' }} "
                                href="/bph/data-sintua">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sintua</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/data-kartu-keluarga') ? 'active' : '' }} "
                                href="/bph/data-kartu-keluarga">
                                <i class="far fa-circle nav-icon"></i>
                                <p>KK</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/data-jemaat') ? 'active' : '' }} " href="/bph/data-jemaat">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jemaat</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('bph/cetak-data') ? 'active' : '' }}">
                    <a href="/bph/cetak-data" class="nav-link {{ request()->is('bph/cetak-data') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Cetak
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item {{ request()->is('pendaftar-pembelajaran-sidi', 'data-pelajar-sidi','buka-pendaftaran-pembelajaran-sidi') ? 'menu-open' : '' }} ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Sidi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item active">
                            <a class="nav-link {{ request()->is('buka-pendaftaran-pembelajaran-sidi') ? 'active' : '' }}"
                                href="/buka-pendaftaran-pembelajaran-sidi">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buka Pendaftaran</p>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link {{ request()->is('pendaftar-pembelajaran-sidi') ? 'active' : '' }}"
                                href="/pendaftar-pembelajaran-sidi">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('data-pelajar-sidi') ? 'active' : '' }} "
                                href="/data-pelajar-sidi">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pelajar Sidi</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item {{ request()->is('bph/master-data-keuangan','bph/master-data-pendapatan','bph/master-data-pengeluaran','bph/deposit','bph/tambah-data-master-pendapatan','bph/pengeluaran-gereja','bph/tambah-data-master-pengeluaran') ? 'menu-open' : '' }} ">
                    <a href="#" class="nav-link {{ request()->is('bph/master-data-keuangan','bph/master-data-pendapatan','bph/master-data-pengeluaran','bph/deposit','bph/tambah-data-master-pendapatan','bph/pengeluaran-gereja') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Keuangan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/master-data-keuangan','bph/master-data-pendapatan','bph/master-data-pengeluaran') ? 'active' : '' }}"
                                href="/bph/master-data-keuangan">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Master</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/deposit') ? 'active' : '' }} "
                                href="/bph/deposit">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/pengeluaran-gerejabph/') ? 'active' : '' }} "
                                href="/bph/pengeluaran-gereja">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengeluaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('surat-keterangan-jemaat','bph/surat-keterangan-jemaat','bph/surat-keterangan-pernikahan','bph/surat-keterangan-pindah','bph/surat-keterangan-kematian') ? 'menu-open' : '' }} ">
                    <a href="#" class="nav-link {{ request()->is('surat-keterangan-jemaat','bph/surat-keterangan-jemaat','bph/surat-keterangan-pernikahan','bph/surat-keterangan-pindah','bph/surat-keterangan-kematian') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Surat Keterangan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('surat-keterangan-jemaat','bph/surat-keterangan-jemaat') ? 'active' : '' }}"
                                href="/bph/surat-keterangan-jemaat">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SK Jemaat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/surat-keterangan-Pernikahan','bph/surat-keterangan-pernikahan') ? 'active' : '' }}"
                                href="/bph/surat-keterangan-pernikahan">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SK Nikah</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/surat-keterangan-pindah') ? 'active' : '' }} "
                                href="/bph/surat-keterangan-pindah">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SK Pindah</p>
                            </a>
                        </li>
                        {{--  --}}
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('bph/surat-keterangan-kematian') ? 'active' : '' }} "
                                href="/bph/surat-keterangan-kematian">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SK Kematian </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
