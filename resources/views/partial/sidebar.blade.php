<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Lapor Polibatam</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('user')->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-1">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('data-pendeta','tambah-data-pendeta') ? 'active' : '' }}" href="/data-pendeta">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pendeta</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('data-wijk','tambah-data-wijk','data-wijk-anggota-wijk-') ? 'active' : ''}} " href="/data-wijk">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Wijk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('data-sintua','tambah-data-sintua') ? 'active' : ''}} " href="/data-sintua">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sintua</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('data-kartu-keluarga','tambah-data-kartu-keluarga') ? 'active' : ''}} " href="/data-kartu-keluarga">
                      <i class="far fa-circle nav-icon"></i>
                      <p>KK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('data-jemaat') ? 'active' : ''}} " href="/data-jemaat">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Jemaat</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="/cetak-data" class="nav-link ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Cetak
                  </p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Keuangan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('data-pendeta','tambah-data-pendeta') ? 'active' : '' }}" href="/data-pendeta">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Master</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('data-wijk','tambah-data-wijk','data-wijk-anggota-wijk-') ? 'active' : ''}} " href="/data-wijk">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Deposit</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('data-sintua','tambah-data-sintua') ? 'active' : ''}} " href="/data-sintua">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pengeluaran</p>
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
