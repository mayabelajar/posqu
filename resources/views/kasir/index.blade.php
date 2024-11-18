<link rel="stylesheet" href="{{ asset('/ini.css') }}">
<link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.css') }}">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- <script src="{{ asset('/lte/dist/js/adminlte.min.js') }}"></script> --> <!-- Ini komen dropdown muncul -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!-- Ini komen beranda bisa -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/> -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
      <img src="{{ asset('/lte/dist/img/logoPOS.png') }}" alt="POSq Logo" class="img-circle elevation-3"
           style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Jaya</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/admin') }}" class="nav-link {{ Request::segment(1) == 'admin'? 'active-link' : 'nonactive-link' }}">
              <i class="nav-icon bx bxs-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{ url('/daftar-product') }}" class="nav-link {{ Request::segment(1) == 'daftar-product'? 'active-link' : 'nonactive-link' }}">
              <i class="nav-icon bx bxs-notepad"></i>
              <p>
                Daftar Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{ url('/transaksi') }}" class="nav-link {{ Request::segment(1) == 'transaksi'? 'active-link' : 'nonactive-link' }}">
              <i class="nav-icon bx bxs-wallet"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{ url('/harian') }}" class="nav-link {{ Request::segment(1) == 'harian'? 'active-link' : 'nonactive-link' }}">
              <i class="nav-icon bx bxs-report"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{ url('/logout') }}" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <!-- <div class="row mb-2"> -->
          <!-- <div class="col-sm-6">
            <h5 class="m-0 text-dark">Kategori</h5>
          </div>/.col -->
        <!-- </div>/.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin/footer')