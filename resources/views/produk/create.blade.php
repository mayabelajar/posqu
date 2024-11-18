<div class="contaier">
<div class="card">
            <h2>Add New Product</h2>
            <form class="needs-validation" novalidate>
            <div class="form-row mt-3">
              <div class="col-md-6 mb-3">
                <label for="product-image">Gambar Produk</label>
                <input type="file" class="form-control" id="product-image" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>
              <!-- <label for="validationCustom01">Nama Produk</label>
              <input type="text" class="form-control" id="validationCustom01" value="Masukkan nama produk" required>
              <div class="valid-feedback">
                Looks good!
              </div> -->
              <div class="col-md-6 mb-3">
                <label for="validationCustom01">Nama Produk</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Masukkan nama produk" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <!-- <label for="validationCustom01">Harga</label>
              <label class="sr-only" for="inlineFormInputGroup">Username</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
              </div> -->
            </div>
            <div class="form-row mt-2">
              <div class="col-md-6 mb-3">
                <label for="validationCustom01">Harga</label>
                <label class="sr-only" for="inlineFormInputGroup">Harga</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Rp</div>
                  </div>
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Masukkan harga produk">
                </div>
              </div>
              <!-- <label for="product-image">Product Image</label>
              <input type="file" class="form-control" id="product-image" required>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div> -->
    <div class="col-md-3 mb-3">
    <label for="validationCustom05">Stok</label>
      <input type="text" class="form-control" id="validationCustom05" placeholder="Masukkan jumlah stok" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
      <!-- <label for="validationCustom04">State</label>
      <select class="custom-select" id="validationCustom04" required>
        <option selected disabled value="">Choose...</option>
        <option>...</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
      </div> -->
    </div>
    <div class="col-md-3 mb-3">
    <label for="inputState">Kategori</label>
      <select id="inputState" class="form-control">
        <option selected>Pilih Kategori</option>
        <option>Makanan</option>
        <option>Minuman</option>
        <option>Camilan</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
      </div>
      <!-- <label for="validationCustom05">Zip</label>
      <input type="text" class="form-control" id="validationCustom05" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div> -->
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