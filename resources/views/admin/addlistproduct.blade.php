<html>
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/ini.css') }}">
    <script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/lte/dist/js/adminlte.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Add New Product</h2>
            <form class="needs-validation" novalidate>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="product-image">Product Image</label>
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
            <div class="form-row">
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
  <button class="btn btn-primary" type="submit">Simpan</button>
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

        

        <div class="card">
            <h2>List Product</h2>
            <div class="row mt-3">
            <div class="col-sm-6">
            <div class="filter-buttons">
                <button class="active">Semua</button>
                <button>Makanan</button>
                <button>Minuman</button>
                <button>Camilan</button>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="search-container">
                <input type="text" placeholder="Cari disini">
                <button><i class="fas fa-search"></i></button>
            </div>
            </div>
            </div>
            
            
            <div class="table-container">
                <table class="table table-striped table-default mt-4">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Category</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MK01</td>
                            <td>Mie Aceh</td>
                            <td>Makanan</td>
                            <td>Rp 20.000</td>
                            <td>100</td>
                            <td>14-10-2024 08:08</td>
                        </tr>
                        <tr>
                            <td>MK02</td>
                            <td>Gudeg</td>
                            <td>Makanan</td>
                            <td>Rp 15.000</td>
                            <td>50</td>
                            <td>14-10-2024 08:09</td>
                        </tr>
                        <tr>
                            <td>CM01</td>
                            <td>Bika Ambon</td>
                            <td>Camilan</td>
                            <td>Rp 10.000</td>
                            <td>30</td>
                            <td>14-10-2024 08:11</td>
                        </tr>
                        <tr>
                            <td>MN01</td>
                            <td>Es Rujak Gobet</td>
                            <td>Minuman</td>
                            <td>Rp 8.000</td>
                            <td>25</td>
                            <td>14-10-2024 08:12</td>
                        </tr>
                        <tr>
                            <td>MN02</td>
                            <td>Es Dawet Ayu</td>
                            <td>Minuman</td>
                            <td>Rp 8.000</td>
                            <td>20</td>
                            <td>14-10-2024 08:13</td>
                        </tr>
                        <tr>
                            <td>CM02</td>
                            <td>Lumpia</td>
                            <td>Camilan</td>
                            <td>Rp 10.000</td>
                            <td>20</td>
                            <td>14-10-2024 08:14</td>
                        </tr>
                        <tr>
                            <td>MK03</td>
                            <td>Ayam Betutu</td>
                            <td>Makanan</td>
                            <td>Rp 25.000</td>
                            <td>15</td>
                            <td>14-10-2024 08:15</td>
                        </tr>
                        <tr>
                            <td>MN03</td>
                            <td>Bajigur</td>
                            <td>Minuman</td>
                            <td>Rp 8.000</td>
                            <td>13</td>
                            <td>14-10-2024 08:16</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>