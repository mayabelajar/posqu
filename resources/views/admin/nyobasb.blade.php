<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>POSq</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- Navbar -->
@include('admin/header')
<!-- navbar -->

<!-- Main Sidebar Container -->
@include('admin/sidebar')
<!-- Content Wrapper. Contains page content -->

  

  
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-light">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <div class="keranjang">
      <h4>Keranjang<h4>
      </div>

      <!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
    <style>
        /* Gaya CSS di sini */
        body {
            font-family: Arial, sans-serif;
        }
        .item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .quantity {
            width: 20px;
            text-align: center;
        }
        .price {
            text-align: right;
        }
    </style>
</head>
<body>
<div class="pemesanan mb-4">
     <div class="flex justify-between mb-2">
      <img class="gambar1" src="{{ asset('/lte/dist/img/rujakcingur.jpeg') }}">
      <span>
       Rujak Cingur
      </span>
      <button class="krj">
        <i class="fa fa-plus-circle"></i>
      </button>
      <button class="krj">
        <i class="fa fa-minus-circle"></i>
      </button>
      <span>
       Rp 12.000
      </span>
     </div>
     <div class="flex justify-between items-center mb-2">
     <img class="gambar2" src="{{ asset('/lte/dist/img/rendang.jpeg') }}">
      <span>
       Rendang
      </span>
      <span>
       Rp 48.000
      </span>
     </div>
     <div class="flex justify-between items-center mb-2">
     <img class="gambar3" src="{{ asset('/lte/dist/img/ayambetutu.jpeg') }}">
      <span>
       Ayam Betutu
      </span>
      <span>
       Rp 35.000
      </span>
     </div>
    </div>
    <div class="notes">
        <label for="notes">Catatan:</label>
        <textarea id="notes" rows="4" cols="25"></textarea>
    </div>
    <div class="border-t border-gray-250 mb-4">
    </div>
    <div class="detail">
    <p><strong>Item:</strong> 3 items</p>
    <p><strong>Subtotal:</strong> Rp 48.000</p>
    <p><strong>Diskon:</strong> 50%</p>
    <p><strong>Pajak 10%:</strong> Rp 0</p>
    <p><strong>TOTAL:</strong> Rp 24.000</p>
    </div>
    <button class="tambah mb-4"><i class="fa fa-plus ml-2" aria-hidden="true"></i> Tambahkan Diskon</button>
    <button class="proses">Proses Transaksi</button>
    <script>
        // JavaScript untuk menghitung total, mengelola diskon, dll.
    </script>
</body>
</html>
    </div>
  </aside>
  <!-- /.control-sidebar -->

<!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/lte/dist/js/adminlte.min.js') }}"></script>



</body>
</html>