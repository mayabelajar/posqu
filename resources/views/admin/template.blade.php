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
          <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        </div>
          <div class="col-3">
          <div class="card" style="width: 100%;">
          <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        </div>
          <div class="col-3">
          <div class="card" style="width: 100%;">
          <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
          </div>
          <div class="col-3">
          <div class="card" style="width: 100%;">
          <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection