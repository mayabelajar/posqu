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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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



<div class="pemesanan mb-4">
  <div class="flex justify-between items-center mb-2">
    <img class="gambar1" src="{{ asset('/lte/dist/img/rujakcingur.jpeg') }}">
    <span>Rujak Cingur</span>
    <button class="krj"><i class="fa fa-plus-circle"></i></button>
    <button class="krj"><i class="fa fa-minus-circle"></i></button>
    <span>Rp12.000</span>
  </div>
</div>
<div class="flex justify-between items-center mb-2">
  <img class="gambar2" src="{{ asset('/lte/dist/img/rendang.jpeg') }}">
  <span>Rendang</span>
  <button class="krj"><i class="fa fa-plus-circle"></i></button>
  <button class="krj"><i class="fa fa-minus-circle"></i></button>
  <span>Rp48.000</span>  
</div>
<div class="flex justify-between items-center mb-2">
  <img class="gambar3" src="{{ asset('/lte/dist/img/ayambetutu.jpeg') }}">
  <span>Ayam Betutu</span>
  <button class="krj"><i class="fa fa-plus-circle"></i></button>
  <button class="krj"><i class="fa fa-minus-circle"></i></button>
  <span>Rp35.000</span>
</div>

<div class="notes">
  <label for="notes">Catatan :</label>
  <textarea class="form-control mb-4" name="notes" rows="4"></textarea>
</div>
   
  <button type="button" class="proses"><a href="{{ url('/payment') }}">Proses Transaksi</a></button>
  
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>


    <script>
        // JavaScript untuk menghitung total, mengelola diskon, dll.
    </script>

    </div>
  </aside>
  <!-- /.control-sidebar -->

<!-- Main Footer -->

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
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