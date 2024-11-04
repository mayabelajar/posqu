<link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/css/font-awesome.min.css') }}">

@extends('admin.nyobasb')

@section('content') 
<!-- Kategori -->
 <div class="main--content">
    <div class="card--container">
      <h3 class="main--title">Kategori</h3>
        <div class="card--wrapper">
        <div class="container text-center">
        <div class="row">
        <div class="col-4">
        <div class="categories">
        <div class="card--header">
          <img src="{{ asset('/lte/dist/img/makanan.png') }}">
            <div class="amount">
              <span class="title">Makanan</span>
              <span class="amount--value">25</span>
            </div>
        </div>
        </div>
        </div>
          <div class="col-4">
          <div class="categories">
          <div class="card--header">
            <img src="{{ asset('/lte/dist/img/minuman.png') }}">
              <div class="amount">
                <span class="title">Minuman</span>
                <span class="amount--value">24</span>
              </div>
        </div>
        </div>
        </div>
          <div class="col-4">
          <div class="categories">
          <div class="card--header">
            <img src="{{ asset('/lte/dist/img/camilan.png') }}">
              <div class="amount">
                <span class="title">Camilan</span>
                <span class="amount--value">6</span>
              </div>
          </div>
          </div>
          </div>
        </div>
    </div>
  </div>
</div>

<!-- Hidangan Populer -->
<div class="main--content">
    <div class="card--container">
      <h3 class="main--title">Hidangan Populer</h3>
        <div class="card--wrapper">
        <div class="container text-center">
        <div class="row">
        <div class="col-3">
        <div class="card" style="width: 100%;">
          <img src="{{ asset('/lte/dist/img/user8-128x128.jpg') }}" class="text-center card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Rujak Cingur</h5>
              <p class="card-text">Makanan khas Jawa Timur. Perpaduan antara sayuran, buah, tahu, tempe, dan petis yang diuleg bersama petis dan kacang.</p>
              <h5 class="card-title">Rp12.000</h5>
              <button type="button" class="btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-success"><i class="fa-solid fa-cart-plus"></i></button>
            </div>
        </div>
        </div>
        <div class="col-3">
        <div class="card" style="width: 100%;">
          <img src="{{ asset('/lte/dist/img/user8-128x128.jpg') }}" class="card-img-top" align="center" alt="...">
            <div class="card-body">
              <h5 class="card-title">Rujak Cingur</h5>
              <p class="card-text">Makanan khas Jawa Timur. Perpaduan antara sayuran, buah, tahu, tempe, dan petis yang diuleg bersama petis dan kacang.</p>
              <h5 class="card-title">Rp12.000</h5>
              <button type="button" class="btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-success"><i class="fa-solid fa-cart-plus"></i></button>
            </div>
        </div>
        </div>
        <div class="col-3">
        <div class="card" style="width: 100%;">
          <img src="{{ asset('/lte/dist/img/user8-128x128.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Rujak Cingur</h5>
              <p class="card-text">Makanan khas Jawa Timur. Perpaduan antara sayuran, buah, tahu, tempe, dan petis yang diuleg bersama petis dan kacang.</p>
              <h5 class="card-title">Rp12.000</h5>
              <button type="button" class="btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-success"><i class="fa-solid fa-cart-plus"></i></button>
            </div>
        </div>
        </div>
        <div class="col-3">
        <div class="card" style="width: 100%;">
          <img src="{{ asset('/lte/dist/img/user8-128x128.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Rujak Cingur</h5>
              <p class="card-text">Makanan khas Jawa Timur. Perpaduan antara sayuran, buah, tahu, tempe, dan petis yang diuleg bersama petis dan kacang.</p>
              <h5 class="card-title">Rp12.000</h5>
              <button type="button" class="btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-success"><i class="fa-solid fa-cart-plus"></i></button>
            </div>
        </div>
        </div>
        </div>
    </div>
  </div>
</div>

@endsection