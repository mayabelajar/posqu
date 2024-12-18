<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@extends('admin.sidebar')

@section('content')
<div class="container"> 
  <div class="row"> 
    <div class="col-sm">
      <div class="flex items-center justify-between p-4 bg-white shadow">
        <div class="flex items-center">
          <i class="fa fa-search text-gray-500"></i>
          <input id="filterInput" class="ml-2 p-2 w-64 bg-gray-100 rounded-full focus:outline-none" placeholder="Search" type="text">
        </div>
        <div class="flex items-center">
          <input id="tanggal-picker" class="ml-2 p-2 w-64 bg-gray-100 rounded-full focus:outline-none" placeholder="Pilih Tanggal" type="date">
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-8">
      <div class="bg-white shadow rounded-lg p-4 overflow-y-auto">
        <div class="overflow-auto">
          @foreach ($groupedPesanan as $pemesananId => $pesanans)
              <div class="flex items-center mb-4 pesanan-row"
                data-order-id="{{ $pemesananId }}"
                data-product-name="{{ strtolower(implode(' ', $pesanans->pluck('produk.nama')->toArray())) }}">
                <img alt="uang icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/uang.png') }}" width="40">
                <div class="ml-4">
                  <div>{{ $pemesananId }}</div>
                  <div>
                  @foreach ($pesanans as $pesanan)
                    <span class="pesanan" data-product-name="{{ $pesanan->produk->nama ?? 'Produk Tidak Ditemukan' }}" 
                          data-qty="{{ $pesanan->qty }}" 
                          data-amount="Rp{{ number_format($pesanan->produk->harga * $pesanan->qty, 0, ',', '.') }}">
                      {{ $pesanan->qty }}x {{ $pesanan->produk->nama ?? 'Produk Tidak Ditemukan' }}
                    </span>@if (!$loop->last), @endif
                  @endforeach
                </div>
                <div>{{ $pesanans->first()->pemesanan->metode_pembayaran ?? '-'}} - Rp{{ number_format($pesanans->first()->pemesanan->total ?? 0, 0, ',', '.') }}</div>
              </div>
              <div class="ml-auto">{{ $pesanans->first()->pemesanan->created_at ?? '-' }}</div>
            </div>
            @endforeach
            <div class="flex justify-between items-center mt-4">
              <span>{{ $paginatedPesananIds->firstItem() }} - {{ $paginatedPesananIds->lastItem() }} dari {{ $totalPesananIds }} data</span>
              <nav aria-label="Pagination">
                  {{ $paginatedPesananIds->appends(['date' => $selectedDate])->links() }}
              </nav>
          </div>       
        </div>
      </div>
    </div>
    <div class="kecil col-4 bg-white shadow rounded-lg p-4">
      <table class="w-full">
        <thead>
          <tr class="bg-gray-200">
            <th class="p-2">Item</th>
            <th class="p-2">QTY</th>
            <th class="p-2">Jumlah</th>
          </tr>
        </thead>
        <tbody id="detailTransaksiTable">
          <tr>
            <td colspan="3" class="text-center text-gray-500 p-4">
              Klik salah satu transaksi untuk melihat detail.
            </td>
          </tr>
        </tbody>
      </table>
      <div class="total flex justify-end items-center mt-4">
        <span id="totalAmount" class="font-bold">0</span>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  flatpickr("#tanggal-picker", {
    dateFormat: "Y-m-d",
    defaultDate: "{{ $selectedDate ?? now()->format('Y-m-d') }}",
    onChange: function (selectedDates, dateStr) {
      window.location.href = `/transaksi?date=${dateStr}`;
    }
  });

  // Filter input untuk pencarian
  const filterInput = document.getElementById('filterInput');

  filterInput.addEventListener('input', function () {
    const searchTerm = this.value.toLowerCase();
    const pesananRows = document.querySelectorAll('.pesanan-row');

    pesananRows.forEach(function(row) {
      const orderId = row.getAttribute('data-order-id').toLowerCase();
      const productNames = row.getAttribute('data-product-name').toLowerCase();

      if (orderId.includes(searchTerm) || productNames.includes(searchTerm)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });

  function formatNumber(number) {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
  }
  
  // Menangani klik pada baris pesanan
  const pesananRows = document.querySelectorAll('.pesanan-row');
  const tableBody = document.querySelector('#detailTransaksiTable');
  const totalAmount = document.getElementById('totalAmount');

  pesananRows.forEach(row => {
    row.addEventListener('click', function () {
      const orderId = row.getAttribute('data-order-id');
      const productNames = row.getAttribute('data-product-name').split(' '); // Memisahkan nama produk menjadi array

      // Kosongkan isi tabel
      tableBody.innerHTML = '';

      let total = 0;

      // Menambahkan data pesanan ke dalam tabel
      row.querySelectorAll('.pesanan').forEach(function(pesanan) {
        const productName = pesanan.getAttribute('data-product-name');
        const qty = pesanan.getAttribute('data-qty');
        const amount = pesanan.getAttribute('data-amount');

        // Membuat baris untuk setiap produk yang dipilih
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td class="p-2">${productName}</td>
          <td class="p-2">${qty}</td>
          <td class="p-2">${amount}</td>
        `;
        tableBody.appendChild(tr);

        // Menjumlahkan total
        total += parseInt(amount.replace('Rp', '').replace('.', '').replace('', ''), 10);
      });

      // Memperbarui total amount
      totalAmount.textContent = `${formatNumber(total)}`;
    });
  });
});
  
  // const data = [
  //   {id:01, metode:"semuametode"},
  //   {id:02, metode:"cash"},
  //   {id:03, metode:"qris"},
  // ];

  // const dataList = document.getElementById('dataList');
  // const filterInput = document.getElementById('filterInput');

  // function filterData() {
  //   const searchTerm = filterInput.value.toLowerCase();
  //   const filteredData = data.filter(person => person.name.toLowerCase().includes(searchTerm));

    // Kosongkan daftar sebelum diisi ulang
    // dataList.innerHTML = '';

    // Tambahkan data yang terfilter ke dalam daftar
  //   filteredData.forEach(person => {
  //     const li = document.createElement('li');
  //     li.textContent = person.name;
  //     dataList.appendChild(li);
  //   });
  // }
</script>
@endsection