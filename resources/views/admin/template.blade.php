
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@extends('admin/nyobasb')

@section('content') 
<!-- Kategori -->
 <!-- <div class="main--content"> main content -->
    <div class="card--container shadow"> <!-- card container -->
      <h3 class="main--title">Kategori</h3>
      <div class="card--wrapper"> <!-- card wrapper -->
        <div class="container text-center"> <!-- container -->
          <div class="row"><!-- row -->
            <div data-kt="kategori" class="ktgr col-4"> <!-- col -->
              <div class="categories"> <!-- categories -->
                <div class="card--header"> <!-- card header -->
                  <img src="{{ asset('/lte/dist/img/makanan.png') }}" class="ikon">
                  <div class="amount"> <!-- amount -->
                    <span class="title">Makanan</span>
                    <span class="amount--value">25</span>
                  </div> <!-- tutup amount -->
                </div> <!-- tutup card header -->
              </div> <!-- tutup categories -->
            </div> <!-- tutup  col -->
            <div data-kt="kategori" class="ktgr col-4"> <!-- col -->
              <div class="categories"> <!-- categories -->
                <div class="card--header"> <!-- card header -->
                  <img src="{{ asset('/lte/dist/img/minuman.png') }}" class="ikon">
                  <div class="amount"> <!-- amount -->
                    <span class="title">Minuman</span>
                    <span class="amount--value">24</span>
                  </div> <!-- tutup amount -->
                </div> <!-- tutup card header -->
              </div> <!-- tutup categories -->
            </div> <!-- tutup col -->
            <div data-kt="kategori" class="ktgr col-4"> <!-- col -->
              <div class="categories"> <!-- categories -->
                <div class="card--header"> <!-- card header -->
                  <img src="{{ asset('/lte/dist/img/camilan.png') }}" class="ikon">
                  <div class="amount"> <!-- amount -->
                    <span class="title">Camilan</span>
                    <span class="amount--value">6</span>
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
        <h3 class="main--title">Hidangan Populer</h3>
          <div class="card--wrapper"> <!-- card wrapper -->
            <!-- SEARCH FORM -->
          <form class="form-inline mx-auto" id="searchForm">
            <div class="input-group w-500">
              <input class="seacrh form-control form-control-navbar" id="searchQuery" type="text" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" id="addItemButton" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
          <div id="searchResult"></div>
          
            <div class="container text-center"> <!-- container -->
              <div class="row"> <!--row -->
              @foreach ($produks as $data)
                <div class="col-3"> <!-- col -->
                  <div class="card" style="width: 100%;"  > <!-- card -->
                    <img src="{{ asset('/storage/produks/'.$data->image) }}" class="rounded-circle mx-auto my-3" width="100px" alt="">
                    <div class="card-body"> <!-- card body -->
                      <h5 class="card-title">{{$data->nama}}</h5>
                      <h5 class="card-title">Rp{{$data->harga}}</h5>
                      <button type="button" class="btn-text btn btn-success">Beli Sekarang</button>
                      <button type="button" id="tambahkeranjang" class="tmbl btn btn-icon" data-id="{{$data->id}}" data-nama="{{$data->nama}}" data-harga="{{$data->harga}}" data-image="{{ asset('/storage/produks/'.$data->image) }}"><i class="fa fa-cart-plus" aria-hidden="true"></i></button> 
                    </div> <!-- card body -->
                  </div> <!-- card -->
                </div> <!-- col -->
                @endforeach
              </div> <!-- row -->
            </div> <!-- container -->
            
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

    <div class="notes">
      <label for="notes">Catatan :</label>
      <textarea class="form-control mb-4" name="notes" rows="4"></textarea>
    </div>
    <div class="border-t border-gray-250 mb-3"></div>
    <div class="flex justify-between mb-3">
        <div class="total">0</div>
    </div>
    <button id="btnTransaksi" class="proses">Proses Transaksi</button>
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
                    <span>${(item.harga * item.quantity).toFixed(2)}</span>
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
            } else {
                console.log("Produk tidak ditemukan! Pastikan ID sesuai.");
            }
        }

        function removeFromCart(id) {
          var storageproduk = JSON.parse(localStorage.getItem('keranjang')) || [];
          storageproduk = storageproduk.filter(item => item.id !== id);
          localStorage.setItem('keranjang', JSON.stringify(storageproduk));
          displayCart();
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
        });

        displayCart();
      });

      $(document).ready(function(){
              $(".categories").click(function(){
                $(".categories").css('background-color', 'white');
                $(this).css('background-color', '#F6C029');
                $(function() {
              $('.ikon').click(function(){
                $("#bg").attr('src',"{{ asset('/lte/dist/img/makanan.png') }}");
                return false;
              });
              });
                // console.log($(this).attr("data-ktgr"))
            });
        });

        $(document).ready(function() {
        $('#searchForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah form dari pengiriman biasa

            var query = $('#searchQuery').val();

            $.ajax({
                url: '{{ route("admin.admin") }}',
                method: 'GET',
                data: { query: query },
                success: function(data) {
                    $('#searchResults').html(data);
                }
            });
        });
    });
    </script>



    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="flex items-center justify-center">
                    <div class="bg-white rounded-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-yellow-500">
                        <i class="fa fa-tags mr-2">
                        </i>
                        Discount Pesanan
                        </h2>
                        <button class="text-yellow-500">
                        </button>
                        </div>
                        <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                        Masukkan jumlah diskon
                        </label>
                        <div class="flex items-center">
                        <input class="w-full p-2 border rounded-l" placeholder="0" type="text"/>
                        <span class="bg-gray-200 p-2 border rounded-r">
                        %
                        </span>
                        </div>
                        </div>
                        <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                        Masukkan kode voucher
                        </label>
                        <input class="w-full p-2 border rounded" placeholder="Kode Voucher" type="text"/>
                        </div>
                        <button class="bg-green-500 text-white px-4 py-2 rounded w-full">
                        Pakai Diskon
                        </button>
                    </div>
                    </div>
                </div>
        </div>
        </div>
    </div>
    </div> -->
    <!-- <script src="ini.js"></script> 
    <script>
    let produks = [
    {
        id: 1,
        name: "Mie Aceh",
        gambar: "miaceh.JPEG",
        price: 15000
    },
    {
        id: 2,
        name: "Es Dawet",
        images: "esdawet.JPEG",
        price: 8000
    },
    {
        id: 3,
        name: "Rendang",
        images: "rendang.JPEG",
        price: 25000
    },
    {
        id: 4,
        name: "Rujak Cingur",
        images: "rujakcingur.JPEG",
        price: 12000
    },
    {
        id: 5,
        name: "Papeda",
        images: "papeda.JPEG",
        price: 25000
    },
    {
        id: 6,
        name: "Lumpia",
        images: "lumpia.JPEG",
        price: 10000
    },
    {
        id: 7,
        name: "Ayam Betutu",
        images: "ayambetutu.JPEG",
        price: 20000
    },
    {
        id: 8,
        name: "Wedang Uwuh",
        images: "wedanguwuh.JPEG",
        price: 10000
    },
    ]      

    function loadProduks(){
      produk.foreach(d => {
        $('#tambahkeranjang').append(`
          <div class="container text-center">
              <div class="row"> 
              @foreach ($produks as $data)
                <div class="col-3"> 
                  <div class="card" style="width: 100%;"> 
                    <img src="{{ asset('/storage/app/public/produks/'.$data->image) }}" class="rounded-circle mx-auto my-3" width="100px" alt="">
                    <div class="card-body"> 
                      <h5 class="card-title">{{$data->nama}}</h5>
                      <p class="card-text">{{$data->deskripsi}}</p>
                      <h5 class="card-title">Rp{{$data->harga}}</h5>
                      <button type="button" id="tambahkeranjang" class="tmbl btn btn-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></button> 
                    </div>
                  </div> 
                </div> 
                @endforeach
              </div> 
            </div> 
            
        `)
      })
    }
      
    </script> -->
@endsection