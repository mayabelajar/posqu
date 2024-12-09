@extends('admin.sidebar')

@section('content')
<div class="container">
  <div class="card">
    <form action="{{ route('produks.update', $produks->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <h2>Add New Product</h2>
        <div class="form-row mt-3">
          <div class="col-md-6 mb-3">
            <label for="product-image">Gambar Produk</label>
            <input type="file" class="form-control" name="image">
              <div class="invalid-feedback">
                Please provide a valid image.
              </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationCustom01">Nama Produk</label>
            <input type="text" class="form-control" value="{{ old('nama', $produks->nama) }}" name="nama" placeholder="Masukkan nama produk" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
        </div>
        <div class="form-row mt-2">
          <div class="col-md-6 mb-3">
            <label for="validationCustom01">Harga</label>
            <label class="sr-only" for="inlineFormInputGroup">Harga</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
              </div>
              <input type="text" class="form-control" name="harga" value="{{ old('harga', $produks->harga) }}" placeholder="Masukkan harga produk">
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom05">Stok</label>
            <input type="text" class="form-control" name="stok" value="{{ old('stok', $produks->stok) }}" placeholder="Masukkan jumlah stok" required>
            <div class="invalid-feedback">
              Please provide a valid stok.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="inputState">Kategori</label>
            <select class="form-control" name="kategori" value="{{ old('kategori', $produks->kategori) }}">
              <option selected>Pilih Kategori</option>
              <option>Makanan</option>
              <option>Minuman</option>
              <option>Camilan</option>
            </select>
          </div>
        </div>
        <button class="btn btn-simpan mt-3" type="submit">Tambahkan</button>
    </form>
  </div>
</div>

<!-- <div class="container">
  <div class="card">
  <form action="{{ route('produks.update', $produks->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="exampleFormControlFile1">Gambar Produk</label>
    <input type="file" class="form-control-file" name="image">
    <div class="invalid-feedback">Tolong masukkan gambar yang sesuai.</div>
  </div>
  <div class="form-group">
    <label for="validationCustom01">Nama Produk</label>
    <input type="text" class="form-control" value="{{ old('nama', $produks->nama) }}" name="nama" placeholder="Masukkan nama produk" required>
    <div class="valid-feedback">Sukses menambahkan data!</div>
  </div>
  <div class="form-group">
    <label for="validationCustom01">Harga</label>
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Rp</span>
    </div>
    <input type="text" class="form-control" name="harga" value="{{ old('harga', $produks->harga) }}" placeholder="Masukkan harga produk">
  </div>
  <div class="form-group">
    <label for="validationCustom05">Stok</label>
      <input type="text" class="form-control" name="stok" value="{{ old('stok', $produks->stok) }}" placeholder="Masukkan jumlah stok" required>
      <div class="valid-feedback">Sukses menambahkan data!</div>
  </div>
  <div class="form-group">
    <label for="inputState">Kategori</label>
    <select class="form-control" name="kategori" value="{{ old('kategori', $produks->kategori) }}">
      <option selected>Pilih Kategori</option>
      <option>Makanan</option>
      <option>Minuman</option>
      <option>Camilan</option>
    </select>
  </div>
  <button class="btn btn-simpan mt-3" type="submit">Batal</button>
  <button class="btn btn-simpan mt-3" type="submit">Simpan</button>
</form>
  </div>
</div> -->

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

@endsection