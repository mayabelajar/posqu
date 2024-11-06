<!-- jQuery -->
<!-- <script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
<!-- AdminLTE App -->
<script src="{{ asset('/lte/dist/js/adminlte.min.js') }}"></script>
<!-- Font Awesome Icons -->
<!-- <link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/css/font-awesome.min.css') }}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('/ini.css') }}">

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
        <img src="{{ asset('/lte/dist/img/rujakcingur.jpeg') }}" class="rounded-circle mx-auto my-3" width="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title">Rujak Cingur</h5>
              <p class="card-text">Makanan khas Jawa Timur. Perpaduan antara sayuran, buah, tahu, tempe, dan petis yang diuleg bersama petis dan kacang.</p>
              <h5 class="card-title">Rp12.000</h5>
              <button type="button" class="btn-text btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
            </div>
        </div>
        </div>
        <div class="col-3">
        <div class="card" style="width: 100%;">
          <img src="{{ asset('/lte/dist/img/esdawet.jpeg') }}" class="rounded-circle mx-auto my-3" width="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title">Es Dawet</h5>
              <p class="card-text">Minuman khas Jawa Tengah. Minuman ini memiliki rasa manis yang berasal dari gula merah dan rasa gurih yang berasal dari santan.</p>
              <h5 class="card-title">Rp8.000</h5>
              <button type="button" class="btn-text btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
            </div>
        </div>
        </div>
        <div class="col-3">
        <div class="card" style="width: 100%;">
        <img src="{{ asset('/lte/dist/img/lumpia.jpeg') }}" class="rounded-circle mx-auto my-3" width="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title">Lumpia</h5>
              <p class="card-text">Makanan khas Jawa Tengah. Lumpia terbuat dari rebung sebagai isiannya dan digulung oleh kulit yang terbuat dari tepung.</p>
              <h5 class="card-title">Rp10.000</h5>
              <button type="button" class="btn-text btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
            </div>
        </div>
        </div>
        <div class="col-3">
        <div class="card" style="width: 100%;">
        <img src="{{ asset('/lte/dist/img/rendang.jpeg') }}" class="rounded-circle mx-auto my-3" width="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title">Rendang</h5>
              <p class="card-text">Makanan khas Sumatera Barat. Perpaduan antara daging dan rempah nusantara, yang dimasak 12 jam lamanya.</p>
              <h5 class="card-title">Rp35.000</h5>
              <button type="button" class="btn-text btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
            </div>
        </div>
        </div>
        </div>
    </div>
    <div class="card--wrapper">
        <div class="container text-center">
        <div class="row">
        <div class="col-3">
        <div class="card" style="width: 100%;">
        <img src="{{ asset('/lte/dist/img/ayambetutu.jpeg') }}" class="rounded-circle mx-auto my-3" width="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title">Ayam Betutu</h5>
              <p class="card-text">Makanan khas Bali. Ayam utuh yang dimasak dengan bumbu rempah khas Bali kemudian dipanggang dengan api sekam.</p>
              <h5 class="card-title">Rp12.000</h5>
              <button type="button" class="btn-text btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
            </div>
        </div>
        </div>
        <div class="col-3">
        <div class="card" style="width: 100%;">
          <img src="{{ asset('/lte/dist/img/papeda.jpeg') }}" class="rounded-circle mx-auto my-3" width="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title">Papeda</h5>
              <p class="card-text">Papeda adalah yang berasal dari Maluku dan pesisir Papua. Makanan ini berupa bubur sagu dan biasanya disajikan dengan ikan tongkol.</p>
              <h5 class="card-title">Rp25.000</h5>
              <button type="button" class="btn-text btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
            </div>
        </div>
        </div>
        <div class="col-3">
        <div class="card" style="width: 100%;">
        <img src="{{ asset('/lte/dist/img/wedanguwuh.jpeg') }}" class="rounded-circle mx-auto my-3" width="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title">Wedang Uwuh</h5>
              <p class="card-text">Minnuman Khas Yogyakarta. Minuman tradisional yang terbuat dengan rempah-rempah untuk menyehatkan badan.</p>
              <h5 class="card-title">Rp10.000</h5>
              <button type="button" class="btn-text btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
            </div>
        </div>
        </div>
        <div class="col-3">
        <div class="card" style="width: 100%;">
        <img src="{{ asset('/lte/dist/img/mieaceh.jpeg') }}" class="rounded-circle mx-auto my-3" width="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title">Mie Aceh</h5>
              <p class="card-text">Makanan khas Aceh. Mie tebal berwarna kuning yang dimasak dengan bumbu kari dan diberi topping seafood.</p>
              <h5 class="card-title">Rp15.000</h5>
              <button type="button" class="btn-text btn btn-success">Beli Sekarang</button>
              <button type="button" class="btn btn-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
            </div>
        </div>
        </div>
        </div>
    </div>
  </div>
</div>

@endsection