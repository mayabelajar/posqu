
<html>
<head>
  <script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/lte/dist/js/adminlte.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/css/font-awesome.min.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('/ini.css') }}">
  <link rel="stylesheet" href="{{ asset('/fontawesome/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<form action="{{ route('pemesanan.prosesData') }}" method="POST" class="form-pesanan">
  @csrf
  <body class="bg-[#e8e3c9] flex justify-center items-center h-screen">
      <div class="bg-white p-8 rounded-lg shadow-lg w-[800px]">
        <div class="grid grid-cols-2 gap-8">
          <div>
            <h2 class="text-xl font-bold mb-4">Detail Pembayaran</h2>
            <div class="border border-yellow-500 p-4 rounded-lg mb-2">
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm" for="total-payment">Total Pembayaran</label>
                  <input name="total" class="form-control border border-yellow-500 rounded-lg w-full p-2" id="total-payment" type="text" readonly/>
                </div>
                <div>
                  <label class="block text-sm" for="total-money">Total Uang</label>
                  <input name="bayar" id="total-uang" class="border border-yellow-500 rounded-lg w-full p-2" type="text"/>
                </div>
              </div>
            </div>
            <input type="hidden" name="kembalian" id="kembalian-hidden"/>
          </div>
          <div>
            <h2 class="text-xl font-bold mb-4">Ringkasan Pesanan</h2>
            <div id="data-keranjang"></div>
            <div class="flex justify-between">
              <button type="button" class="kembali"><a href="{{ url('/admin') }}">Kembali</a></button>
              <button type="button" class="bayar" data-bs-toggle="modal" data-bs-target="#exampleModal">Proses</button>
            </div>
          </div>
        </div>
      </div>
  </body>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg text-center">
              <i class="fa fa-check-circle"></i>
              <div class="text-xl font-bold mb-2">1MK011510240001</div>
              <div class="flex justify-between mb-4">
                <div>
                  <div class="text-gray-600">Total Pembayaran</div>
                  <span id="total-bayar" class="text-2xl font-bold"></span>
                </div>
                <div>
                  <div class="text-gray-600">Kembalian</div>
                  <span id="kembalian" class="text-2xl font-bold"></span>
                </div>
              </div>
              <div class="flex space-x-4">
                <button class="kirim py-2 px-4"><i class="fa fa-cutlery"> </i> Kirim ke Dapur</button>
                <button class="cetak py-2 px-4"><i class="fa fa-print"> </i> Cetak Struk</button>
                <button type="button" class="baru py-2 px-4"><i class="fa fa-plus"> </i>Baru</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
  $(document).ready(function() {
    function formatNumber(number) {
      return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
    }

    let subtotal = 0;

    // Fetch data keranjang
    $.ajax({
      type: "GET",
      url: "/get_session_category",
      success: function(response) {
        const keranjang = response.keranjang || [];
        const container = $("#data-keranjang");

        if (keranjang.length > 0) {
          keranjang.forEach(item => {
            container.append(`
              <div class="flex justify-between mb-2">
                <span>${item.nama}</span>
                <span>${item.quantity} x</span>
                <span>${formatNumber(item.harga)}</span>
              </div>
            `);
          });

          subtotal = keranjang.reduce((sum, item) => sum + (item.harga * item.quantity), 0);

          container.append(`
            <div class="border-b border-yellow-500 mb-4"></div>
            <div class="mb-4">
              <div class="flex justify-between mb-2">
                <span>Total</span>
                <span>${formatNumber(subtotal)}</span>
              </div>
            </div>
          `);

          $("#total-payment").val(subtotal);
          $("#total-bayar").text(formatNumber(subtotal));
        } else {
          container.html("<p>Keranjang Anda kosong.</p>");
        }
      },
      error: function(xhr) {
        console.error("Error:", xhr.responseText);
      }
    });

    $(".bayar").on("click", function() {
      const totalUang = parseFloat($("#total-uang").val()) || 0;
      const kembalian = totalUang - subtotal;

      $("#kembalian-hidden").val(kembalian);
      $("#kembalian").text(formatNumber(kembalian));
    });

    $(".baru").on("click", function() {
      // $(".form-pesanan")
      $.ajax({
              type: "POST",
              url: "/prosesData",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              data: {
                total: $("#total-payment").val(subtotal);,
                bayar: $("#total-uang").val();,
                kembalian: $("#kembalian").text(formatNumber(kembalian));,
              }
              // JSON.stringify({ key1:JSON.stringify(storageproduk)  }),
              contentType: "application/json",
              success: function(response) {
                console.log("Success:", response);
                // window.location.href = '/payment';
              },
              error: function(xhr, status, error) {
                  console.error("Error:", status, error);
                  alert("Gagal memproses transaksi");
              }
          });
    });
  });
</script>
</html>