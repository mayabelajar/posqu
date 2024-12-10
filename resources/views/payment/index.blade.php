
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

<form action="{{ route('pemesanan.prosesData') }}" method="POST">
  @csrf
<body class="bg-[#e8e3c9] flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-[800px]">
      <div class="grid grid-cols-2 gap-8">
        <div>
          <h2 class="text-xl font-bold mb-4">Detail Pembayaran</h2>
          <div class="border border-yellow-500 p-4 rounded-lg mb-2">
            <!-- <div class="flex items-center mb-4">
              <input class="mr-2" id="cash" name="payment" type="radio"/>
              <label class="flex items-center" for="cash">Tunai</label>
            </div> -->
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm" for="total-payment">Total Pembayaran</label>
                <input name="total" class="form-control border border-yellow-500 rounded-lg w-full p-2" id="total-payment" type="text" readonly/>
              </div>
              <div>
                <label class="block text-sm" for="total-money">Total Uang</label>
                <input name="bayar" id="total-uang" class="border border-yellow-500 rounded-lg w-full p-2" id="total-money" type="text"/>
              </div>
            </div>
          </div>
          <input type="hidden" name="kembalian" id="kembalian-hidden"/>
          <!-- <div class="border border-yellow-500 p-4 rounded-lg mb-2">
            <div class="radio-group">
              <div class="flex items-center">
                <input class="mr-2" id="cash" name="payment" type="radio"/>
                <label for="cash">
                <img src="{{ asset('/lte/dist/img/qris.PNG') }}" height="80" width="80"/>
              </div>
            </div>
          </div> -->
          <!-- <div class="border border-yellow-500 p-4 rounded-lg mb-2">
            <button type="button" class="diskon mb-2" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus mr-4"></i>Tambahkan Diskon</button>
          </div> -->
        </div>
        <div>
          <h2 class="text-xl font-bold mb-4">Ringkasan Pesanan</h2>
          <div id="data-keranjang"></div>
  
          <!-- Apabila nantinya menggunakan diskon
          <div class="flex justify-between mb-2">
            <span>Diskon</span>
            <span>50%</span>
          </div>
          <div class="flex justify-between mb-2">
            <span>Total</span>
            <span>Rp ${subtotal.toFixed(2)}</span>
          </div> -->
     
          <div class="flex justify-between">
            <button type="button" class="kembali" ><a href="{{ url('/admin') }}">Kembali</a> </button>
            <!-- <button type="button" class="plh" ><a href="{{ url('/meja') }}">Pilih Meja</a> </button> -->
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
        <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body">
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
          <div class="bg-white p-8 rounded-lg text-center">
            <i class="fa fa-check-circle"></i>
            <div class="text-xl font-bold mb-2">1MK011510240001</div>
            <div class="flex justify-between mb-4"><div>
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
      <button type="submit" class="baru py-2 px-4"><i class="fa fa-plus"> </i><a href="{{ url('/admin') }}">Baru</a></button>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button>
</div>
</form>

<!-- Modal -->
<!-- <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <h2 class="text-xl font-bold text-yellow-500"><i class="fa fa-tags mr-2"></i>Discount Pesanan</h2>
              <button class="text-yellow-500"></button>
            </div>
              <div class="mb-4">
                <label class="block text-gray-700 mb-2">Masukkan jumlah diskon</label>
                <div class="flex items-center">
                  <input class="w-full p-2 border rounded-l" placeholder="0" type="text"/>
                  <span class="bg-gray-200 p-2 border rounded-r">%</span>
                </div>
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 mb-2">Masukkan kode voucher</label>
                <input class="w-full p-2 border rounded" placeholder="Kode Voucher" type="text"/>
              </div>
              <button class="bg-green-500 text-white px-4 py-2 rounded w-full">Pakai Diskon</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

    
<script>
  $(document).ready(function() {
    function formatNumber(number) {
        let parts = number.toFixed(2).split("."); // Pastikan angka memiliki 2 desimal
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Tambahkan koma sebagai pemisah ribuan
        return parts.join("."); // Gabungkan kembali bagian integer dan desimal
    }

    let subtotal = 0; // Variabel untuk menyimpan subtotal

    // Fetch data keranjang
    $.ajax({
      type: "GET",
      url: "/get_session_category",
      success: function(response) {
        var keranjang = response.keranjang || [];
        var container = $("#data-keranjang");

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

          // Hitung subtotal
          subtotal = keranjang.reduce((sum, item) => sum + (item.harga * item.quantity), 0);

          // Tampilkan subtotal
          container.append(`
            <div class="border-b border-yellow-500 mb-4"></div>
            <div class="mb-4">
              <div class="flex justify-between mb-2">
                <span>Total</span>
                <span>Rp ${formatNumber(subtotal)}</span>
              </div>
            </div>
          `);

          // Tampilkan subtotal di input
          $("#total-payment").val(`Rp${formatNumber(subtotal)}`);
          $("#total-bayar").text(`Rp${formatNumber(subtotal)}`);
        } else {
          container.html("<p>Keranjang Anda kosong.</p>");
        }
      },
      error: function(xhr, status, error) {
        console.error("Error:", xhr.responseText);
      }
    });

    // Hitung kembalian ketika total uang diinput
    $(".bayar").on("click", function () {
        let totalUang = parseFloat($("#total-uang").val().replace(/[^0-9.-]+/g, "")) || 0;
        let kembalian = totalUang - subtotal;

        $("#kembalian-hidden").val(kembalian); // Masukkan nilai ke input hidden
        $("#kembalian").text(`Rp ${formatNumber(kembalian)}`); // Tampilkan di modal
    });
  });
</script>