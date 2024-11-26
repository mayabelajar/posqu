@extends('admin.sidebar')

@section('content')
  <!-- <div class="flex flex-col h-screen"> -->
<div class="container"> <!-- Container -->
  <div class="row"> <!-- Row -->
    <div class="col-sm"> <!-- col -->
      <div class="flex items-center justify-between p-4 bg-white shadow"> <!-- 1 -->
        <div class="flex items-center"> <!-- 2 -->
          <i class="fa fa-search text-gray-500"></i>
          <input class="ml-2 p-2 w-64 bg-gray-100 rounded-full focus:outline-none" placeholder="Search" type="text">
        </div> <!-- tutup 2 -->
        <div class="flex items-center"> <!-- 3 -->
          <span>
            SEMUA METODE
          </span>
          <div class="dropdown mr-4"> <!-- 4 -->
            <button class="dropbtn">
              <i class="bx bxs-filter-alt"></i>
            </button>
            <input type="text" id="filterInput">
            <div class="dropdown-content"> <!-- 5 -->
              <a href="" onclick="filterData()"><i class="bx bx-wallet-alt" name="semuametode"></i>   SEMUA METODE</a>
              <a href="" onclick="filterData()"><i class="bx bx-money-withdraw" name="cash"></i>   CASH</a>
              <a href="" onclick="filterData()"><i class="bx bx-qr-scan" name="qris"></i>   QRIS</a>
            </div> <!-- tutup 5 -->
            <ul id="dataList"></ul>
          </div> <!-- tutup 4 -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Sen, 04 November 2024
            </a>
            <div class="dropdown-menu"> <!-- 6 -->
              <a class="dropdown-item" href="#">Min, 03 November 2024</a>
              <a class="dropdown-item" href="#">Sab, 02 November 2024</a>
            </div> <!-- tutup 6 -->
          </li>
        </div> <!-- tutup 3 -->
      </div> <!-- tutup 1 -->
    </div> <!-- tutup col -->
  </div> <!-- tutup row -->
  <div class="row mt-4"> <!-- row -->
    <div class="col-8"> <!-- col -->
      <!-- <div class="flex flex-1 p-4"> 1 -->
        <div class="bg-white shadow rounded-lg p-4 overflow-y-auto"> <!-- 2 -->
          <div class="overflow-auto"> <!-- 3 -->
            <div class="flex items-center mb-4"> <!-- 4 -->
              <img alt="QRIS icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/qriskecil.png') }}" width="40">
              <div class="ml-4"> <!-- 5 -->
                <div> <!-- 6 -->
                  1MK011510240001
                </div> <!-- tutup 6 -->
                <div> <!-- 7 -->
                  2x Rujak Cingur, 1x Es Dawet, 2x Cenil
                </div> <!-- tutup 7 -->
                <div> <!-- 8 -->
                  19.000 - QRIS
                </div> <!-- tutup 8 -->
              </div> <!-- tutup 5 -->
              <div class="ml-auto"> <!-- 9 -->
                16 Okt 2024 - 10.36
              </div> <!-- tutup 9 -->
            </div> <!-- tutup 4 -->
            <div class="flex items-center mb-4"> <!-- 10 -->
              <img alt="Cash icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/uang.png') }}" width="40">
              <div class="ml-4"> <!-- 11 -->
                <div> <!-- 12 -->
                  1MK011510240001
                </div> <!-- tutup 12 -->
                <div> <!-- 13 -->
                  2x Rujak Cingur, 1x Es Dawet, 2x Cenil
                </div> <!-- tutup 13 -->
                <div> <!-- 14 -->
                  19.000 - CASH
                </div> <!-- tutup 14 -->
              </div> <!-- tutup 11 -->
              <div class="ml-auto"> <!-- 15 -->
                16 Okt 2024 - 10.36
              </div> <!-- tutup 15 -->
            </div> <!-- tutup 10 -->
            <div class="flex items-center mb-4"> <!-- 16 -->
              <img alt="QRIS icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/qriskecil.png') }}" width="40">
              <div class="ml-4"> <!-- 17 -->
                <div> <!-- 18 -->
                  1MK011510240001
                </div> <!-- tutup 18 -->
                <div> <!-- 19 -->
                  2x Rujak Cingur, 1x Es Dawet, 2x Cenil
                </div> <!-- tutup 19 -->
                <div> <!-- 20 -->
                  19.000 - QRIS
                </div> <!-- tutup 20 -->
              </div> <!-- tutup 17 -->
              <div class="ml-auto"> <!-- 21 -->
                16 Okt 2024 - 10.36
              </div> <!-- tutup 21 -->
            </div> <!-- tutup 16 -->
            <div class="flex items-center mb-4"> <!-- 22 -->
              <img alt="QRIS icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/qriskecil.png') }}" width="40">
              <div class="ml-4"> <!-- 23 -->
                <div> <!-- 24 -->
                  1MK011510240001
                </div> <!-- tutup 24 -->
                <div> <!-- 25 -->
                  2x Rujak Cingur, 1x Es Dawet, 2x Cenil
                </div> <!-- tutup 25 -->
                <div> <!-- 26 -->
                  19.000 - QRIS
                </div> <!-- tutup 26 -->
              </div> <!-- tutup 23 -->
              <div class="ml-auto"> <!-- 27 -->
              16 Okt 2024 - 10.36
              </div> <!-- tutup 27 -->
            </div> <!-- tutup 22 -->
            <div class="flex items-center mb-4"> <!--28 -->
              <img alt="Cash icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/uang.png') }}" width="40">
              <div class="ml-4"> <!-- 29 -->
              <div> <!-- 30 -->
                1MK011510240001
              </div> <!-- tutup 30 -->
              <div> <!-- 31 -->
              2x Rujak Cingur, 1x Es Dawet, 2x Cenil
            </div> <!-- tutup 31 -->
            <div> <!-- 32 -->
              19.000 - CASH
            </div> <!-- tutup 32 -->
          </div> <!-- tutup 29 -->
          <div class="ml-auto"> <!-- 33 -->
            16 Okt 2024 - 10.36
          </div> <!-- tutup 33 -->
      </div> <!-- tutup 28 -->
      <div class="flex items-center mb-4"> <!-- 34 -->
          <img alt="QRIS icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/qriskecil.png') }}" width="40">
          <div class="ml-4">  <!-- 35 -->
            <div> <!-- 36 -->
              1MK011510240001
            </div> <!-- tutup 36 -->
            <div> <!-- 37 -->
              2x Rujak Cingur, 1x Es Dawet, 2x Cenil
            </div> <!-- tutup 37 -->
            <div> <!-- 38 -->
              19.000 - QRIS
            </div> <!-- tutup 38 -->
          </div> <!-- tutup 35 -->
          <div class="ml-auto"> <!-- 39 -->
          16 Okt 2024 - 10.36
          </div> <!-- tutup 39 -->
      </div> <!-- tutup 34 -->
      <div class="flex justify-between items-center mt-4"> <!-- 40 -->
          <span>
          1 - 10 dari 68 data
          </span>
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
        </div> <!-- tutup 40 -->
      </div> <!-- tutup 3 -->
    </div> <!-- tutup 2 -->
  <!-- </div> tutup 1 -->
  </div> <!-- col -->
      <div class="kecil col-4 bg-white shadow rounded-lg p-4"> <!-- col -->
        <!-- <div class="bg-white shadow rounded-lg p-4"> 1 -->
          <table class="w-full">
            <thead>
              <tr class="bg-gray-200">
                <th class="p-2">
                  Item
                </th>
                <th class="p-2">
                QTY
                </th>
                <th class="p-2">
                Jumlah
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="p-2">
                  Rujak Cingur
                </td>
                <td class="p-2">
                  2x
                </td>
                <td class="p-2">
                  12.000
                </td>
              </tr>
              <tr>
                <td class="p-2">
                  Es Dawet
                </td>
                <td class="p-2">
                  1x
                </td>
                <td class="p-2">
                  16.000
                </td>
              </tr>
              <tr>
                <td class="p-2">
                  Cenil
                </td>
                <td class="p-2">
                  2x
                </td>
                <td class="p-2">
                  10.000
                </td>
              </tr>
            </tbody>
          </table>
          <div class="total flex justify-end items-center mt-4"> <!-- 2 -->
            <span>
              Rp 38.000
            </span>
          </div> <!-- tutup 2 -->
        <!-- </div> tutup 1 -->
      </div> <!-- col -->  
    </div> <!-- row -->
</div> <!-- container -->

<script>
  const data = [
    {id:01, metode:"semua metode"},
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