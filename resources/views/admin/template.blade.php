
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@extends('admin/nyobasb')

@section('content') 
<!-- Kategori -->
 <!-- <div class="main--content"> main content -->
    <div class="card--container shadow"> <!-- card container -->
      <h3 class="main--title">Kategori</h3>
      <div class="card--wrapper"> <!-- card wrapper -->
        <div class="container text-center"> <!-- container -->
          <div class="row" id="kategori-container"><!-- row -->
            <div data-kt="kategori" class="ktgr col-4" data-kategori="Makanan" onclick="getProdukByKategori('Makanan')"> <!-- col -->
              <div class="categories"> <!-- categories -->
                <div class="card--header"> <!-- card header -->
                    <img class="ikon" src="{{ asset('/lte/dist/img/makanan.png') }}" alt="Icon">
                  <div class="amount"> <!-- amount -->
                    <span class="title">Makanan</span>
                    <span class="amount--value">{{ $counts['Makanan'] ?? 0 }}</span>
                  </div> <!-- tutup amount -->
                </div> <!-- tutup card header -->
              </div> <!-- tutup categories -->
            </div> <!-- tutup  col -->
            <div data-kt="kategori" class="ktgr col-4" data-kategori="Minuman" onclick="getProdukByKategori('Minuman')"> <!-- col -->
              <div class="categories"> <!-- categories -->
                <div class="card--header"> <!-- card header -->
                  <img src="{{ asset('/lte/dist/img/minuman.png') }}" class="ikon">
                  <div class="amount"> <!-- amount -->
                    <span class="title">Minuman</span>
                    <span class="amount--value">{{ $counts['Minuman'] ?? 0 }}</span>
                  </div> <!-- tutup amount -->
                </div> <!-- tutup card header -->
              </div> <!-- tutup categories -->
            </div> <!-- tutup col -->
            <div data-kt="kategori" class="ktgr col-4" data-kategori="Camilan" onclick="getProdukByKategori('Camilan')"> <!-- col -->
              <div class="categories"> <!-- categories -->
                <div class="card--header"> <!-- card header -->
                  <img src="{{ asset('/lte/dist/img/camilan.png') }}" class="ikon">
                  <div class="amount"> <!-- amount -->
                    <span class="title">Camilan</span>
                    <span class="amount--value">{{ $counts['Camilan'] ?? 0 }}</span>
                  </div> <!-- tutup amount -->
                </div> <!-- tutup card header -->
              </div> <!-- tutup categories -->
            </div> <!-- tutup col -->
          </div> <!-- tutup row -->
        </div> <!-- tutup container -->
      </div> <!-- tutup card wrapper -->
    </div> <!-- tutup card container -->
<!-- </div> tutup main content -->

    <!-- Hidangan Populer -->
    <!-- <div class="main--content"> main content -->
      <div class="card--container shadow mt-4"> <!-- card container -->
        <h3 id="main-title" class="main--title">Semua Menu</h3>
          <div class="card--wrapper"> <!-- card wrapper -->
            <!-- SEARCH FORM -->
          <form class="form-inline mx-auto" id="searchForm">
            <div class="input-group w-500">
              <input type="text" id="admin-search-input" class="form-control" placeholder="Search" aria-label="Search">
            </div>
          </form>

          <div id="produk-list" class="row mt-4">
            <!-- Produk akan dimuat di sini setelah kategori diklik -->
            <div class="container text-center"> <!-- container -->
              <div class="row"> <!--row -->
              @foreach ($produks as $data)
                <div class="col-3"> <!-- col -->
                  <div class="card" style="width: 100%;"  > <!-- card -->
                    <div class="row"> 
                      <div class="col-5">
                      <img src="{{ asset('/storage/produks/'.$data->image) }}" class="rounded-circle mb-2" width="80px" alt="">
                      </div>
                      <div class="col-7 mb-5 items-center">
                      <div class="card-body"> <!-- card body -->
                        <div class="card-title mb-1">{{$data->nama}}</div>
                      </div>
                      <div class="row">
                      <div class="col-8 mb-1">
                        <div class="card-harga mb-1">Rp{{$data->harga}}</div>
                      </div>
                      <div class="col-4">
                        <button type="button" class="tmbl btn btn-icon tambahkeranjang" 
                          data-id="{{$data->id}}" 
                          data-nama="{{$data->nama}}" 
                          data-harga="{{$data->harga}}" 
                          data-image="{{ asset('/storage/produks/'.$data->image) }}">
                          <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        </button> 
                      </div>
                      </div>
                    </div>
                    </div> <!-- card body -->
                  </div> <!-- card -->
                </div> <!-- col -->
                @endforeach
              </div> <!-- row -->
            </div> <!-- container -->
          </div>
            
          </div> <!-- card wrapper -->
        </div> <!-- card container -->
      <!-- </div> main content -->

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

    <div class="catatan">
      <label for="catatan">Catatan :</label>
      <textarea class="form-control mb-4" name="catatan" rows="4"></textarea>
    </div>
    <div class="border-t border-gray-250 mb-3"></div>
    <div class="flex justify-between mb-3">
        <div class="total" id="totalItems">0</div> <!-- Menampilkan jumlah item dan harga -->
    </div>
    <button id="btnTransaksi" class="proses">Proses Transaksi</button>
  </div>
</aside>

  

     
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
      // $(document).ready(function(){
      //   $(".tmbl").click(function(){
      //     console.log($(this).attr("data-id"))
      //     var storageproduk = localStorage.getItem(produks);
      //     if(storageproduk.length>0){
      //       storageproduk.push({

      //       })
      //     }else{
      //       let produks = [

      //       ]
      //       localStorage.setItem(keranjang,produks);
      //     }
      //   })
      // })
      $(document).ready(function(){
        function formatNumber(number) {
            let parts = number.toFixed(2).split("."); // Pastikan angka memiliki 2 desimal
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Tambahkan koma sebagai pemisah ribuan
            return parts.join("."); // Gabungkan kembali bagian integer dan desimal
        }

        function hitungTotal() {
          var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
          var total = storageproduk.reduce(function (sum, item) {
              return sum + (item.harga * item.quantity);
          }, 0);
          $('.total').text('Rp ' + formatNumber(total));
        }

        

        $(".tmbl").click(function(){
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
          }else{
            storageproduk[existingProductIndex].quantity += 1;
            console.log("Kuantitas produk ditambahkan :", product);
          }
          localStorage.setItem('keranjang', JSON.stringify(storageproduk));
          console.log("Produk ditambahkan ke keranjang:", product);
          displayCart();
          hitungTotal();
        });

        $(document).ready(function () {
  // Event listener untuk tombol tambah ke keranjang
  $(".tambahkeranjang").click(function () {
    const itemId = $(this).data("id");
    const itemNama = $(this).data("nama");
    const itemHarga = $(this).data("harga");
    const itemImage = $(this).data("image");

    // Ambil data keranjang dari LocalStorage atau buat array baru
    let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];

    // Cek apakah item sudah ada di keranjang
    const existingItem = keranjang.find(item => item.id === itemId);

    if (existingItem) {
      // Jika sudah ada, tambahkan quantity
      existingItem.quantity += 0;
    } else {
      // Jika belum ada, tambahkan item baru
      keranjang.push({
        id: itemId,
        nama: itemNama,
        harga: itemHarga,
        image: itemImage,
        quantity: 1
      });
    }

    // Simpan kembali keranjang ke LocalStorage
    localStorage.setItem("keranjang", JSON.stringify(keranjang));

    // Memanggil fungsi untuk menampilkan keranjang
    showCart();
    updateCartBadge();
    

  });

  
});

// Fungsi untuk memperbarui badge jumlah item di keranjang
function updateCartBadge() {
  const keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];
  const itemCount = keranjang.reduce((total, item) => total + item.quantity, 0);
  $("#cartItemCount").text(itemCount); // Update jumlah item di badge
}

// Fungsi untuk menampilkan isi keranjang
function showCart() {
    const keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];
    let cartHTML = "";

    if (keranjang.length === 0) {
        cartHTML = "<p>Keranjang kosong!</p>";
    } else {
        cartHTML += '<ul class="list-group">';
        keranjang.forEach((item, index) => {
            cartHTML += `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <img src="${item.image}" alt="${item.nama}" width="50" height="50">
                    <div>
                        <strong>${item.nama}</strong><br>
                        Harga: Rp ${item.harga.toLocaleString()}<br>
                        Quantity: 
                        <button class="btn btn-sm btn-info decreaseQuantity" data-index="${index}">-</button> 
                        ${item.quantity} 
                        <button class="btn btn-sm btn-info increaseQuantity" data-index="${index}">+</button>
                    </div>
                    <button class="btn btn-danger btn-sm removeItem" data-index="${index}">Hapus</button>
                </li>
            `;
        });
        cartHTML += "</ul>";
    }

    $("#cart-container").html(cartHTML); // Ganti dengan ID elemen yang sesuai
}


// Event untuk mengurangi quantity item
$(document).on("click", ".decreaseQuantity", function () {
  const index = $(this).data("index");
  let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];

  if (keranjang[index].quantity > 1) {
    keranjang[index].quantity -= 1;  // Kurangi quantity jika lebih dari 1
  } else {
    // Jika quantity sudah 1, bisa dihapus
    keranjang.splice(index, 1);
  }

  // Update LocalStorage dan tampilan keranjang
  localStorage.setItem("keranjang", JSON.stringify(keranjang));
  showCart();
  updateCartBadge(); // Perbarui badge jumlah item
});

// Event untuk menambah quantity item
$(document).on("click", ".increaseQuantity", function () {
  const index = $(this).data("index");
  let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];

  keranjang[index].quantity += 1;  // Tambah quantity
  localStorage.setItem("keranjang", JSON.stringify(keranjang));

  showCart();
  updateCartBadge(); // Perbarui badge jumlah item
});

// Event untuk menghapus item dari keranjang
$(document).on("click", ".removeItem", function () {
  const index = $(this).data("index");
  let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];

  // Hapus item berdasarkan index
  keranjang.splice(index, 1);

  // Update LocalStorage dan tampilan keranjang
  localStorage.setItem("keranjang", JSON.stringify(keranjang));
  showCart();
  updateCartBadge(); // Perbarui badge jumlah item
});


$(document).ready(function () {
  // Event listener untuk tombol kurang quantity
  $(document).on("click", ".decrease", function () {
    const itemId = $(this).data("id");

    // Ambil keranjang dari LocalStorage
    let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];

    // Cari item berdasarkan ID
    const itemIndex = keranjang.findIndex(item => item.id === itemId);

    if (itemIndex !== -1) {
      if (keranjang[itemIndex].quantity > 1) {
        keranjang[itemIndex].quantity -= 1;
      } else {
        keranjang.splice(itemIndex, 1);
      }
    }

    // Simpan kembali keranjang ke LocalStorage
    localStorage.setItem("keranjang", JSON.stringify(keranjang));

    // Perbarui tampilan keranjang
    updateCartDisplay();
  });

  // Fungsi untuk memperbarui tampilan keranjang
  function updateCartDisplay() {
    const keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];

    // Perbarui jumlah total di badge
    const totalQuantity = keranjang.reduce((total, item) => total + item.quantity, 0);
    $("#cartItemCount").text(totalQuantity);

    // Perbarui tampilan keranjang
    $(".quantity").each(function () {
      const itemId = $(this).data("id");
      const item = keranjang.find(item => item.id === itemId);

      if (item) {
        $(this).text(item.quantity);
      }
    });
  }

  // Panggil updateCartDisplay saat halaman dimuat untuk menampilkan jumlah yang benar
  updateCartDisplay();
});

        function displayCart() {
          var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
          var cartDiv = $('.keranjang');
          cartDiv.empty();
          if (storageproduk.length > 0) {
            console.log("Display keranjang:", storageproduk);
            storageproduk.forEach(function(item) {
              item.quantity = parseInt(item.quantity) || 1;
              cartDiv.append(`
              <div class="pemesanan mb-4">
              <div class="flex justify-between items-center mb-2">
              <div class="col-3">
                <img class="gambar1" src="${item.image}">
              </div>
              <div class="col-6">
                <div class="row">
                  <div class="col">
                    <span>${item.nama}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <button class="krj increase" data-id="${item.id}"><i class="fa fa-plus-circle"></i></button>
                    <span class="quantity" data-id="${item.id}">${item.quantity}</span>
                    <button class="krj decrease" data-id="${item.id}"><i class="fa fa-minus-circle"></i></button>
                  </div>
                  <div class="col">
                    <span>${formatNumber(item.harga * item.quantity)}</span>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <button type="submit" class="delete btn btn-danger btn-sm" data-id="${item.id}"><span class="bx bx-trash"></span></button>
              </div>
              </div>
              </div>
              `);
            });
          } else {
            cartDiv.append('<p>Keranjang Anda kosong.</p>');
          }
        }

        function updateQuantity(id, change) {
            console.log("Update quantity untuk ID:", id, "Change:", change);
            var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
            console.log("Isi keranjang di localStorage:", storageproduk);

            var product = storageproduk.find(item => {
                console.log("Memeriksa item ID:", item.id, "dengan ID:", id);
                return parseInt(item.id) === parseInt(id);
            });
            
            if (product) {
                console.log("Produk ditemukan:", product);
                product.quantity = parseInt(product.quantity) || 0;
                product.quantity += change;

                if (product.quantity <= 0) {
                    console.log("Menghapus produk ID:", id);
                    storageproduk = storageproduk.filter(item => parseInt(item.id) !== parseInt(id));
                } else {
                    console.log("Kuantitas baru produk ID:", id, "=", product.quantity);
                }

                localStorage.setItem('keranjang', JSON.stringify(storageproduk));
                displayCart();
                hitungTotal();
            } else {
                console.log("Produk tidak ditemukan! Pastikan ID sesuai.");
            }
        }

        function removeFromCart(id) {
          var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
          storageproduk = storageproduk.filter(item => item.id !== id);
          localStorage.setItem('keranjang', JSON.stringify(storageproduk));
          displayCart();
          hitungTotal();
        }

        function handleTransaksi() {
          var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
          console.log("Data keranjang di localStorage:", storageproduk);
          if (storageproduk.length > 0) {
            sessionStorage.setItem('dataKeranjang', JSON.stringify(storageproduk));
            
            $.ajax({
              type: "POST",
              url: "/set_session_category",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              data: JSON.stringify({ data: storageproduk }),
              // JSON.stringify({ key1:JSON.stringify(storageproduk)  }),
              contentType: "application/json",
              success: function(response) {
                console.log("Success:", response);
                window.location.href = '/payment';
              },
              error: function(xhr, status, error) {
                  console.error("Error:", status, error);
                  alert("Gagal memproses transaksi");
              }
          });
        // window.location.href = '/payment';
          } else {
            alert('Keranjang anda kosong!');
          }
        }

        $("#btnTransaksi").click(function() {
              handleTransaksi();
        });

        $(".keranjang").on("click", ".increase", function() {
            console.log("Tombol increase diklik!");  
            var id = $(this).data("id");
            console.log("ID produk:", id);
            updateQuantity(id, 1);
        });

        $(".keranjang").on("click", ".decrease", function() {
            console.log("Tombol decrease diklik!"); // Debugging log
            var id = $(this).data("id");
            console.log("ID produk:", id);
            updateQuantity(id, -1);
        });

        $(".keranjang").on("click", ".delete", function() {
            var id = $(this).data("id");
            removeFromCart(id);
            updateCartBadge();
        });

        displayCart();
        hitungTotal();
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
          // Reset semua elemen
          $(".categories").removeClass("active").css('background-color', 'white');
          $(".categories .ikon").each(function() {
              const title = $(this).closest(".categories").find(".title").text().trim().toLowerCase();
              if (defaultIcons[title]){
                $(this).attr('src', defaultIcons[title]);
              }
          });

          $(this).addClass("active").css('background-color', '#F6C029');

          // Ganti ikon kategori aktif
          const title = $(this).find(".title").text().trim().toLowerCase();
          if (activeIcons[title]) {
              $(this).find(".ikon").attr('src', activeIcons[title]);
          }

      });
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

      // document.querySelectorAll('[data-kt="kategori"]').forEach(element => {
      //   element.addEventListener('click', () => {
      //     const kategori = element.getAttribute('data-kategori'); // Ambil kategori
      //     const produkList = document.getElementById('produk-list'); // Tempat menampilkan produk

      //     // Tampilkan loading
      //     produkList.innerHTML = '<p>Loading...</p>';

      //     // Lakukan permintaan ke server
      //     fetch(`/admin/get-produk?kategori=${kategori}`)
      //       .then(response => {
      //         if (!response.ok) {
      //           throw new Error(`HTTP error! status: ${response.status}`);
      //         }
      //         return response.json();
      //       })
      //       .then(data => {
      //         console.log('Data:', data);
      //         if (Array.isArray(data)) {
      //           // Render data
      //         } else {
      //           document.getElementById('produk-list').innerHTML = '<p>Tidak ada data.</p>';
      //         }
      //       })
      //       .catch(error => {
      //         console.error('Kesalahan:', error);
      //         document.getElementById('produk-list').innerHTML = '<p>Terjadi kesalahan saat mengambil data.</p>';
      //       });
      //     });
      // });


      $(document).ready(function() {
    // Ketika pengguna mengetik di input pencarian
    $('#admin-search-input').on('input', function(e) {
        var query = $(this).val(); // Ambil nilai input pencarian

        // Jika input kosong, kosongkan tampilan hasil pencarian
        if (query.length < 1) {
            $('#produk-list').html(''); // Kosongkan daftar produk
            return;
        }

        // Kirimkan permintaan AJAX ke server untuk pencarian
        $.ajax({
            url: "{{ route('admin.produks.search') }}", // Ganti dengan rute pencarian
            type: 'GET',
            data: { query: query }, // Kirimkan query pencarian
            success: function(response) {
                var html = '';
                if (response.length > 0) {
                    // Loop dan tampilkan produk yang sesuai dengan pencarian
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
                                                    <button type="button" class="tmbl btn btn-icon tambahkeranjang"
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
                    // Jika tidak ada hasil pencarian
                    html = '<p>Tidak ada produk yang ditemukan.</p>';
                }

                // Update tampilan dengan hasil pencarian
                $('#produk-list').html(html);
            },
            error: function() {
                alert('Terjadi kesalahan saat melakukan pencarian.');
            }
        });
    });

    // Event listener untuk tombol tambah ke keranjang
    $(document).on('click', '.tambahkeranjang', function () {
        const itemId = $(this).data("id");
        const itemNama = $(this).data("nama");
        const itemHarga = $(this).data("harga");
        const itemImage = $(this).data("image");

        console.log("Menambahkan item ke keranjang:", itemId, itemNama, itemHarga, itemImage); // Debug log

        // Ambil data keranjang dari LocalStorage atau buat array baru
        let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];
        console.log("Keranjang sebelum ditambahkan:", keranjang); // Debug log

        // Cek apakah item sudah ada di keranjang
        const existingItem = keranjang.find(item => item.id === itemId);
        if (existingItem) {
            // Jika sudah ada, tambahkan quantity
            existingItem.quantity += 1;  // Menambahkan quantity 1
            console.log("Item sudah ada, quantity ditambah:", existingItem); // Debug log
        } else {
            // Jika belum ada, tambahkan item baru
            keranjang.push({
                id: itemId,
                nama: itemNama,
                harga: itemHarga,
                image: itemImage,
                quantity: 1
            });
        }

        // Simpan kembali keranjang ke LocalStorage
        localStorage.setItem("keranjang", JSON.stringify(keranjang));
        console.log("Keranjang setelah disimpan:", keranjang); // Debug log

        // Perbarui badge jumlah item di header
        updateCartBadge();
        updateKeranjangUI();
    });

    // Fungsi untuk memperbarui badge jumlah item di keranjang
    function updateCartBadge() {
        let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];
        let totalItems = keranjang.reduce(function(sum, item) {
            return sum + (item.quantity || 0);
        }, 0);

        // Perbarui tampilan badge jumlah keranjang
        $('#cartItemCount').text(totalItems); // Ganti dengan ID atau elemen yang digunakan untuk menampilkan jumlah keranjang
    }

        // Fungsi untuk memperbarui tampilan keranjang di UI
        function updateKeranjangUI() {
        let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];
        let html = '';
        if (keranjang.length > 0) {
            // Loop untuk menampilkan produk dalam keranjang
            keranjang.forEach(function(item) {
                html += `
                    <div class="row">
                        <div class="col-3">
                            <img src="${item.image}" alt="${item.nama}" class="rounded-circle mb-2" width="50px">
                        </div>
                        <div class="col-7">
                            <p>${item.nama}</p>
                            <p>Rp${item.harga}</p>
                            <p>Jumlah: ${item.quantity}</p>
                        </div>
                    </div>
                `;
            });
        } else {
            html = '<p>Keranjang kosong.</p>';
        }

        // Update tampilan keranjang
        $('#keranjang-list').html(html);
    }

    // Panggil fungsi updateCartBadge dan updateKeranjangUI saat pertama kali halaman dimuat
    updateCartBadge();
    updateKeranjangUI();
});

    </script>
@endsection