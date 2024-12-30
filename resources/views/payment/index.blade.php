<html>
<head>
  <script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/lte/dist/js/adminlte.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-between mb-4">
          <div>
            <div class="text-muted">Total Pembayaran</div>
            <span id="total-bayar" class="fs-4 fw-bold"></span>
          </div>
          <div>
            <div class="text-muted">Kembalian</div>
            <span id="kembalian" class="fs-4 fw-bold"></span>
          </div>
        </div>
        <div class="d-flex gap-3">
          <!-- <button class="kirim py-2 px-4"><i class="fa fa-cutlery"> </i> Kirim ke Dapur</button> -->
          <button type="button" class="cetak btn btn-warning"><i class="fa fa-print"></i> Cetak Struk</button>
          <button type="button" class="baru btn btn-success"><i class="fa fa-plus"></i> Baru</button>
        </div>
      </div>
    </div>
  </div>
</div>


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

      const keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];
      const total = $("#total-payment").val();
      const bayar = $("#total-uang").val();

      sessionStorage.setItem("cetakStruk", JSON.stringify({
        keranjang: keranjang,
        total: total,
        bayar: bayar,
        kembalian: kembalian
      }));

      $("#kembalian-hidden").val(kembalian);
      $("#kembalian").text(formatNumber(kembalian));
    });

    $(".baru").on("click", function() {
      var keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];

      if (keranjang.length === 0) {
        alert("Keranjang kosong. Tidak ada data untuk diproses.");
        return;
      }

      const total = $("#total-payment").val();
      const bayar = $("#total-uang").val();
      const kembalian = $("#kembalian-hidden").val();

      $.ajax({
        type: "POST",
        url: "/prosesData",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data: {
          keranjang: keranjang,
          total: total,
          bayar: bayar,
          kembalian: kembalian
        },
        success: function(response) {
          console.log("Data berhasil disimpan:", response);
          localStorage.removeItem("keranjang");
          // alert("Transaksi berhasil disimpan!");
          window.location.href = response.redirect_url; 
        },
        error: function(xhr, status, error) {
          console.error("Gagal menyimpan data:", status, error);
          alert("Terjadi kesalahan saat menyimpan data.");
        }
      });
    });

    $(".cetak").on("click", function () {
      const data = JSON.parse(sessionStorage.getItem("cetakStruk"));

      if (!data) {
          alert("Tidak ada data untuk dicetak.");
          return;
      }

      const now = new Date();
      const tanggal = now.toLocaleDateString('id-ID'); // Format: dd/mm/yyyy
      const waktu = now.toLocaleTimeString('id-ID'); 

      let html = `
      <div style="text-align: center; margin-bottom: 15px;">
        <div style="font-weight: bold; font-size: 18px;">POSq</div>
        <div>Address: 6010 Alpnach, Swiss</div>
        <div>Tel: +62 812 3456 7890</div>
      </div>
      <div style="text-align: center; margin-bottom: 15px;">
          <div style="margin-bottom: 5px;">${tanggal}</div>
          <div style="margin-bottom: 15px;">${waktu}</div>
      </div>
      <hr style="border: 1px solid #ccc; margin-bottom: 20px;">
      <div style="text-align: center; margin-bottom: 20px;">
        <table style="margin: 0 auto; text-align: center; width: 100%;">
          <thead>
            <tr>
              <th>ITEM</th>
              <th>QTY</th>
              <th>HARGA/QTY</th>
            </tr>
          </thead>
          <tbody>
      `;

      data.keranjang.forEach(item => {
        html += `
          <tr>
            <td>${item.nama}</td>
            <td>${item.quantity}</td>
            <td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.harga)}</td>
          </tr>
        `;
      });

      html += `
      </tbody>
        </table>
      </div>
      <hr style="border: 1px solid #ccc; margin-bottom: 20px;">
      <div style="text-align: left; margin-top: 20px; margin-bottom: 20px;">
        <p><strong>Total: </strong>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data.total)}</p>
        <p><strong>Bayar: </strong>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data.bayar)}</p>
        <p><strong>Kembalian: </strong>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data.kembalian)}</p>
      </div>
      <hr style="border: 1px solid #ccc; margin-bottom: 20px;">
      <div style="text-align: center; margin-top: 20px;">
        <strong>Terimakasih</strong><br>
        Kutunggu kamu kembali kesini
      </div>
      `;

      const printWindow = window.open('', '', 'height=400,width=600');
      printWindow.document.write(html);
      printWindow.document.close();

      printWindow.print();

      printWindow.onbeforeunload = function () {

          var keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];

          if (keranjang.length === 0) {
              alert("Keranjang kosong. Tidak ada data untuk diproses.");
              return;
          }

          const total = $("#total-payment").val();
          const bayar = $("#total-uang").val();
          const kembalian = $("#kembalian-hidden").val();

          $.ajax({
              type: "POST",
              url: "/prosesData",
              headers: {
                  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
              },
              data: {
                  keranjang: keranjang,
                  total: total,
                  bayar: bayar,
                  kembalian: kembalian
              },
              success: function(response) {
                  console.log("Data berhasil disimpan:", response);
                  localStorage.removeItem("keranjang");
                  // alert("Transaksi berhasil disimpan!");

                  window.location.href = response.redirect_url;
              },
              error: function(xhr, status, error) {
                  console.error("Gagal menyimpan data:", status, error);
                  alert("Terjadi kesalahan saat menyimpan data.");
              }
          });
      };
    });
  });
</script>
</html>
