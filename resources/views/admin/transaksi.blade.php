@extends('admin.sidebar')

@section('content')
  <!-- <div class="flex flex-col h-screen"> -->
<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="flex items-center justify-between p-4 bg-white shadow">
        <div class="flex items-center">
          <i class="fa fa-search text-gray-500"></i>
          <input class="ml-2 p-2 w-64 bg-gray-100 rounded-full focus:outline-none" placeholder="Search" type="text"/>
        </div>
        <div class="flex items-center">
          <span>
            SEMUA METODE
          </span>
          <div class="dropdown mr-4">
            <button class="dropbtn">
              <i class="bx bxs-filter-alt"></i>
            </button>
            <div class="dropdown-content">
              <a href=""><i class="bx bx-wallet-alt"></i>   SEMUA METODE</a>
              <a href=""><i class="bx bx-money-withdraw"></i>   CASH</a>
              <a href=""><i class="bx bx-qr-scan"></i>   QRIS</a>
            </div>
          </div>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Sen, 04 November 2024
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Min, 03 November 2024</a>
              <a class="dropdown-item" href="#">Sab, 02 November 2024</a>
            </div>
          </li>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
      <div class="flex flex-1 p-4">
        <div class="w-2/3 bg-white shadow rounded-lg p-4 overflow-y-auto">
          <div class="overflow-auto">
            <div class="flex items-center mb-4"> 
              <img alt="QRIS icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/qriskecil.png') }}" width="40"/>
              <div class="ml-4">
                <div>
                  1MK011510240001
                </div>
                <div>
                  2x Rujak Cingur, 1x Es Dawet, 2x Cenil
                </div>
                <div>
                  19.000 - QRIS
                </div>
              </div>
              <div class="ml-auto">
                16 Okt 2024 - 10.36
              </div>
            </div>
            <div class="flex items-center mb-4">
              <img alt="Cash icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/uang.png') }}" width="40"/>
              <div class="ml-4">
              <div>
                1MK011510240001
              </div>
              <div>
                2x Rujak Cingur, 1x Es Dawet, 2x Cenil
              </div>
              <div>
                19.000 - CASH
              </div>
            </div>
            <div class="ml-auto">
              16 Okt 2024 - 10.36
            </div>
          </div>
          <div class="flex items-center mb-4">
            <img alt="QRIS icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/qriskecil.png') }}" width="40"/>
            <div class="ml-4">
              <div>
                1MK011510240001
              </div>
              <div>
                2x Rujak Cingur, 1x Es Dawet, 2x Cenil
              </div>
              <div>
                19.000 - QRIS
              </div>
            </div>
            <div class="ml-auto">
              16 Okt 2024 - 10.36
            </div>
          </div>
          <div class="flex items-center mb-4">
            <img alt="QRIS icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/qriskecil.png') }}" width="40"/>
            <div class="ml-4">
              <div>
                1MK011510240001
              </div>
              <div>
                2x Rujak Cingur, 1x Es Dawet, 2x Cenil
              </div>
              <div>
                19.000 - QRIS
              </div>
            </div>
            <div class="ml-auto">
            16 Okt 2024 - 10.36
            </div>
          </div>
          <div class="flex items-center mb-4">
            <img alt="Cash icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/uang.png') }}" width="40"/>
            <div class="ml-4">
            <div>
              1MK011510240001
            </div>
            <div>
            2x Rujak Cingur, 1x Es Dawet, 2x Cenil
          </div>
          <div>
            19.000 - CASH
          </div>
        </div>
        <div class="ml-auto">
          16 Okt 2024 - 10.36
        </div>
     </div>
     <div class="flex items-center mb-4">
        <img alt="QRIS icon" class="w-10 h-10" height="40" src="{{ asset('/lte/dist/img/qriskecil.png') }}" width="40"/>
        <div class="ml-4">
          <div>
            1MK011510240001
          </div>
          <div>
            2x Rujak Cingur, 1x Es Dawet, 2x Cenil
          </div>
          <div>
            19.000 - QRIS
          </div>
        </div>
        <div class="ml-auto">
        16 Okt 2024 - 10.36
        </div>
     </div>
     <div class="flex justify-between items-center mt-4">
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
      </div>
    </div>
  </div>
</div>
</div>
    <div class="col-sm">
      <div class="w-1/3 bg-white shadow rounded-lg p-4 ml-4">
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
        <div class="total flex justify-end items-center mt-4">
        <span>
          Rp 38.000
        </span>
    </div>
  </div>
</div>
   
   
    
  </div>
@endsection