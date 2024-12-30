<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@extends('admin/nyobasb')

@section('content')
<div class="card--container shadow">
  <h3 class="main--title">Kategori</h3>
  <div class="card--wrapper">
    <div class="container text-center">
      <div class="row" id="kategori-container">
        <div data-kt="kategori" class="ktgr col-4" data-kategori="Makanan" onclick="getProdukByKategori('Makanan')">
          <div class="categories">
            <div class="card--header">
              <img class="ikon" src="{{ asset('/lte/dist/img/makanan.png') }}" alt="Icon">
              <div class="amount">
                <span class="title">Makanan</span>
                <span class="amount--value">{{ $counts['Makanan'] ?? 0 }}</span>
              </div>
            </div>
          </div>
        </div>
        <div data-kt="kategori" class="ktgr col-4" data-kategori="Minuman" onclick="getProdukByKategori('Minuman')">
          <div class="categories">
            <div class="card--header">
              <img src="{{ asset('/lte/dist/img/minuman.png') }}" class="ikon">
              <div class="amount">
                <span class="title">Minuman</span>
                <span class="amount--value">{{ $counts['Minuman'] ?? 0 }}</span>
              </div>
            </div>
          </div>
        </div>
        <div data-kt="kategori" class="ktgr col-4" data-kategori="Camilan" onclick="getProdukByKategori('Camilan')">
          <div class="categories">
            <div class="card--header">
              <img src="{{ asset('/lte/dist/img/camilan.png') }}" class="ikon">
              <div class="amount">
                <span class="title">Camilan</span>
                <span class="amount--value">{{ $counts['Camilan'] ?? 0 }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card--container shadow mt-4">
  <h3 id="main-title" class="main--title">Semua Menu</h3>
  <div class="card--wrapper">
    <!-- SEARCH FORM -->
    <form class="form-inline mx-auto" id="searchForm">
      <div class="input-group w-500">
        <input type="text" id="admin-search-input" class="form-control" placeholder="Search" aria-label="Search">
      </div>
    </form>

    <div id="produk-list" class="row">
      <div class="container text-center">
        <div class="row">
          @foreach ($produks as $data)
          <div class="col-3">
            <div class="card" style="width: 100%;">
              <div class="row align-items-center">
                <div class="col-5 text-center">
                  <img src="{{ asset('/storage/produks/'.$data->image) }}" class="rounded-circle mb-2" width="55px" alt="">
                </div>
                <div class="col-7">
                  <div class="d-flex flex-column">
                    <div class="card-title mb-2">{{$data->nama}}</div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="card-harga">Rp{{$data->harga}}</div>
                      <button type="button" class="tmbl btn btn-icon btn-sm ms-2" 
                        data-id="{{$data->id}}" 
                        data-nama="{{$data->nama}}" 
                        data-harga="{{$data->harga}}" 
                        data-image="{{ asset('/storage/produks/'.$data->image) }}">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<aside class="control-sidebar control-sidebar-light">
  <div class="p-3">
    <div class="keranjang">
      <h4><b>Keranjang</b></h4>
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

    <!-- <div class="catatan">
      <label for="catatan">Catatan :</label>
      <textarea id="catatan" class="form-control mb-4" name="catatan" rows="4"></textarea>
    </div> -->
    <div class="border-t border-gray-250 mb-3"></div>
    <div class="flex justify-between mb-3">
        <div class="total" id="totalItems">0</div>
    </div>
    <button id="btnTransaksi" class="proses">Proses Transaksi</button>
  </div>
</aside>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
  $(document).ready(function () {
        function formatNumber(number) {
            let parts = number.toFixed(2).split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }

        function hitungTotal() {
            var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
            var total = storageproduk.reduce(function (sum, item) {
                return sum + (item.harga * item.quantity);
            }, 0);
            $('.total').text('Rp ' + formatNumber(total));
        }

        function displayCart() {
            var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
            var cartDiv = $('.keranjang');
            cartDiv.empty();
            if (storageproduk.length > 0) {
                storageproduk.forEach(function (item) {
                    cartDiv.append(`
                        <div class="pemesanan mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <div class="col-3">
                                    <img class="gambar1" src="${item.image}">
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col"><span>${item.nama}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button class="krj increase" data-id="${item.id}">
                                                <i class="fa fa-plus-circle"></i>
                                            </button>
                                            <span class="quantity" data-id="${item.id}">${item.quantity}</span>
                                            <button class="krj decrease" data-id="${item.id}">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </div>
                                        <div class="col">
                                            <span>${formatNumber(item.harga * item.quantity)}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="delete btn btn-danger btn-sm" data-id="${item.id}">
                                        <span class="bx bx-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `);
                });
            } else {
                cartDiv.append('<p>Keranjang Anda kosong.</p>');
            }
        }

        function updateCartBadge() {
            const keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];
            const uniqueItemCount = keranjang.length;
            $("#cartItemCount").text(uniqueItemCount);
        }

        function updateQuantity(id, change) {
            var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
            var product = storageproduk.find(item => parseInt(item.id) === parseInt(id));

            if (product) {

                product.quantity += change;

                if (product.quantity <= 0) {
                    storageproduk = storageproduk.filter(item => parseInt(item.id) !== parseInt(id));
                }
            } else if (change > 0) {
                storageproduk.push({ id: id, quantity: change });
            }

            localStorage.setItem('keranjang', JSON.stringify(storageproduk));

            displayCart();
            hitungTotal();
            updateCartBadge();
        }

        function removeFromCart(id) {
            var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
            storageproduk = storageproduk.filter(item => item.id !== id);
            localStorage.setItem('keranjang', JSON.stringify(storageproduk));
            displayCart();
            hitungTotal();
            updateCartBadge();
        }

        $(document).on("click", ".tmbl", function () {
            var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
            var product = {
                id: parseInt($(this).attr("data-id")),
                nama: $(this).attr("data-nama"),
                harga: parseFloat($(this).attr("data-harga")),
                image: $(this).attr("data-image"),
                quantity: 1
            };

            var existingProductIndex = storageproduk.findIndex(item => item.id === product.id);
            if (existingProductIndex === -1) {
                storageproduk.push(product);
            } else {
                storageproduk[existingProductIndex].quantity += 1;
            }

            localStorage.setItem('keranjang', JSON.stringify(storageproduk));
            displayCart();
            hitungTotal();
            updateCartBadge();
        });

        function handleTransaksi() {
          var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];

          console.log("Data keranjang di localStorage:", storageproduk);

          if (storageproduk.length > 0) {
            var dataKirim = {
              data: storageproduk
            };

            sessionStorage.setItem('dataKeranjang', JSON.stringify(dataKirim));

            $.ajax({
              type: "POST",
              url: "/set_session_category",
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              data: JSON.stringify(dataKirim),
              contentType: "application/json",
              success: function(response) {
                console.log("Response sukses:", response);
                window.location.href = '/payment';
              },
              error: function(xhr, status, error) {
                console.error("Error:", status, error);
                console.error("Response error:", xhr.responseText);
                alert("Gagal memproses transaksi");
              }
            });
          } else {
            alert('Keranjang Anda kosong!');
          }
        }

        $("#btnTransaksi").click(function() {
          handleTransaksi();
        });
        
        $(".keranjang").on("click", ".increase", function () {
            var id = $(this).data("id");
            updateQuantity(id, 1);
        });

        $(".keranjang").on("click", ".decrease", function () {
            var id = $(this).data("id");
            updateQuantity(id, -1);
        });

        $(".keranjang").on("click", ".delete", function () {
            var id = $(this).data("id");
            removeFromCart(id);
        });

        displayCart();
        hitungTotal();
        updateCartBadge();
    });

    function getProdukByKategori(kategori) {
      const mainTitle = document.getElementById('main-title');
      if (kategori) {
        mainTitle.textContent = `${kategori}`;
      } else {
        mainTitle.textContent = `Semua Menu`;
      }

      $.ajax({
        url: '/admin/produk-by-kategori',
        method: 'GET',
        data: { kategori: kategori },
        success: function(response) {
          if (response.status === 'success') {
            $('#produk-list').html(response.data);
          } else {
            alert('Gagal mengambil data produk');
          }
        },
        error: function() {
          alert('Terjadi kesalahan saat memuat produk');
        }
      });
    }

    $('#admin-search-input').on('input', function(e) {
      var query = $(this).val();

      if (query.length < 1) {
          $('#produk-list').html('');
          return;
      }

      $.ajax({
        url: "{{ route('admin.produks.search') }}",
        type: 'GET',
        data: { query: query },
        success: function(response) {
          var html = '';
          if (response.length > 0) {
            response.forEach(function(produk) {
                html += `
                    <div class="col-3">
                        <div class="card" style="width: 100%;">
                            <div class="row">
                                <div class="col-5">
                                    <img src="${produk.image}" alt="${produk.nama}" class="rounded-circle mb-2" width="80px">
                                </div>
                                <div class="col-7 mb-5 items-center">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1">${produk.nama}</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 mb-1">
                                            <p class="card-harga mb-1">Rp${produk.harga}</p>
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="tmbl btn btn-icon"
                                                data-id="${produk.id}"
                                                data-nama="${produk.nama}" 
                                                data-harga="${produk.harga}" 
                                                data-image="${produk.image}">
                                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
          } else {
            html = '<p>Tidak ada produk yang ditemukan.</p>';
          }

          $('#produk-list').html(html);
        },
        error: function() {
            alert('Terjadi kesalahan saat melakukan pencarian.');
        }
      });
    });
      
    $(document).ready(function() {
      const defaultIcons = {
        makanan: "{{ asset('/lte/dist/img/makanan.png') }}",
        minuman: "{{ asset('/lte/dist/img/minuman.png') }}",
        camilan: "{{ asset('/lte/dist/img/camilan.png') }}"
      };

      const activeIcons = {
        makanan: "{{ asset('/lte/dist/img/makanan1.png') }}",
        minuman: "{{ asset('/lte/dist/img/minuman1.png') }}",
        camilan: "{{ asset('/lte/dist/img/camilan1.png') }}"
      };

      $(".categories").click(function() {
        $(".categories").removeClass("active").css('background-color', 'white');
        $(".categories .ikon").each(function() {
          const title = $(this).closest(".categories").find(".title").text().trim().toLowerCase();
          if (defaultIcons[title]){
            $(this).attr('src', defaultIcons[title]);
          }
        });

        $(this).addClass("active").css('background-color', '#F6C029');

        const title = $(this).find(".title").text().trim().toLowerCase();
        if (activeIcons[title]) {
            $(this).find(".ikon").attr('src', activeIcons[title]);
        }
      });
    });
</script>
@endsection