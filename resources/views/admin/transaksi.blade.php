@extends('admin.sidebar')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-sm">
      <div class="flex items-center justify-between p-4 bg-white shadow">
        <div class="flex items-center">
          <i class="fa fa-search text-gray-500"></i>
          <input class="ml-2 p-2 w-64 bg-gray-100 rounded-full focus:outline-none" placeholder="Search" type="text">
        </div>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Sen, 04 November 2024</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Min, 03 November 2024</a>
              <a class="dropdown-item" href="#">Sab, 02 November 2024</a>
            </div>
          </li>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-8">
      <div class="bg-white shadow rounded-lg p-4 overflow-y-auto">
        <div class="overflow-auto">
        @if(isset ($pemesanans) && count($pemesanans) > 0)
          @foreach($pemesanans as $pemesanan)
            <div class="flex items-center mb-4">
              <img alt="QRIS icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/uang.png') }}" width="40">
              <div class="ml-4">
                <div>{{ $pemesanan->produks_id}}</div>
                <div>{{ $pemesanan->jumlah }}x {{ $pemesanan->catatan }}</div>
                <div>{{ $pemesanan->metode_pembayaran }} - Rp {{ $pemesanan->total }}</div>
              </div>
              <div class="ml-auto">{{ $pemesanan->created_at }}</div>
            </div>
          @endforeach
        @else
            <p>Tidak ada data pemesanan.</p>
        @endif
          <div class="flex justify-between items-center mt-4">
            <span>1 - {{ count($pemesanans) }} dari {{ count($pemesanans) }} data</span>
            <nav aria-label="...">
              <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link">Previous</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
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
        <tbody>
        @if(isset($listPesanan) && count($listPesanan) > 0)
          @foreach($listPesanan as $pesanan)
          <tr>
            <td class="p-2">{{ $pesanan->produks_id}}</td>
            <td class="p-2">{{ $pesanan->qty }}x</td>
            <td class="p-2">Rp {{ $pesanan->total }}</td>
          </tr>
          @endforeach
        @else
          <p>Tidak ada data</p>
        @endif
        </tbody>
      </table>
      <div class="total flex justify-end items-center mt-4">
        @php
          $total = 0;
          foreach($pemesanans as $pemesanan) {
            $total += $pemesanan->total;
          }
        @endphp
        <span>Rp {{ $total }}</span>
      </div>
    </div>
  </div>
</div>

<script>
  const data = [
    {id:01, metode:"semuametode"},
    {id:02, metode:"cash"},
    {id:03, metode:"qris"},
  ];

  const dataList = document.getElementById('dataList');
  const filterInput = document.getElementById('filterInput');

  function filterData() {
    const searchTerm = filterInput.value.toLowerCase();
    const filteredData = data.filter(person => person.name.toLowerCase().includes(searchTerm));

    // Kosongkan daftar sebelum diisi ulang
    dataList.innerHTML = '';

    // Tambahkan data yang terfilter ke dalam daftar
    filteredData.forEach(person => {
      const li = document.createElement('li');
      li.textContent = person.name;
      dataList.appendChild(li);
    });
  }
</script>
@endsection