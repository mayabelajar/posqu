@extends('admin.nyobasb')

@section('content') 

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
        <span class="amount--value">25</span>
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
        <span class="amount--value">25</span>
      </div>
    </div>
  </div>
    </div>
  </div>
</div>
</div>
</div>

@endsection