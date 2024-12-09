<head>
<link rel="stylesheet" href="{{ asset('/ini.css') }}">
<link rel="stylesheet" href="{{ asset('/ini.js') }}">
<link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- <script src="{{ asset('/lte/dist/js/adminlte.min.js') }}"></script> --> <!-- Ini komen dropdown muncul -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!-- Ini komen beranda bisa -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
   <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>  -->

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
      <div class="user-panel mt-3 pb-3 mb-3 d-flex item-center">
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
          <a href="{{ url('/produks') }}" class="nav-link {{ Request::segment(1) == 'produks'? 'active-link' : 'nonactive-link' }}">
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
              <!-- <i class="nav-icon fa fa-sign-out"></i> -->
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
  <!-- <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSq</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
    
    <div class="sidebar">
      <div class="top">
        <div class="logo">
          <i class="bx bxl-codepen"></i>
          <span>POSq</span>
        </div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <div class="user">
        <img src="user-img.jpg" alt="" class="user-img">
        <div>
          <p class="bold">Jama Piya</p>
        </div>
      </div>
      <ul>
        <li>
          <a href="#">
            <i class="bx bxs-grid-alt"></i>
            <span class="nav-item">Beranda</span>
          </a>
          <span class="tooltip">Beranda</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-grid-alt"></i>
            <span class="nav-item">Beranda</span>
          </a>
          <span class="tooltip">Beranda</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-grid-alt"></i>
            <span class="nav-item">Beranda</span>
          </a>
          <span class="tooltip">Beranda</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-grid-alt"></i>
            <span class="nav-item">Beranda</span>
          </a>
          <span class="tooltip">Beranda</span>
        </li>
      </ul>
    </div>

  </body>

  <script>
    let btn = document.querySelector('#btn')
    let sidebar = documnet.querySelector('.sidebar')

    btn.onclick = function () {
      sidebar.classList.toggle('active')
    };
  </script>

  </html> -->