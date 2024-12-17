@extends('admin.sidebar')

@section('content')
<form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="contaier">
<div class="card">
            <h2>Add New Product</h2>
            <form class="needs-validation" novalidate>
            <div class="form-row mt-3">
              <div class="col-md-6 mb-3">
                <label for="product-image">Gambar Produk</label>
                <input type="file" class="form-control" name="image" required>
                <div class="invalid-feedback">
                  Tolong masukkan gambar yang sesuai!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationCustom01">Nama Produk</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama produk" required>
                <div class="valid-feedback">
                  Kerja bagus!
                </div>
              </div>
            </div>
            <div class="form-row mt-3">
              <div class="col-md-6 mb-3">
                <label for="validationCustom01">Harga</label>
                <label class="sr-only" for="inlineFormInputGroup">Harga</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Rp</div>
                  </div>
                  <input type="text" class="form-control" name="harga" placeholder="Masukkan harga produk">
                  <div class="valid-feedback">
                    Kerja bagus!
                  </div>
                </div>
              </div>
    <div class="col-md-6 mb-3">
    <label for="inputState">Kategori</label>
      <select class="form-control" name="kategori">
        <option selected>Pilih Kategori</option>
        <option>Makanan</option>
        <option>Minuman</option>
        <option>Camilan</option>
      </select>
      <div class="valid-feedback">
        Kerja bagus!
      </div>
    </div>
  </div>
  
  <button class="btn btn-simpan mt-3" type="submit">Tambahkan</button>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
        </div>
</div>
</form>
@endsection