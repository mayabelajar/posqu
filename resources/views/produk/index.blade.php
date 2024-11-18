@extends('admin.sidebar')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/ini.css') }}">
    <script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/lte/dist/js/adminlte.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
    <title>Daftar Produk</title>
    <div class="container">
        <div class="card">
            <h2>List Product</h2>
            <div class="row mt-3">
            <div class="col-sm-6">
            <div class="filter-buttons">
                <button class="active">Semua</button>
                <button>Makanan</button>
                <button>Minuman</button>
                <button>Camilan</button>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="search-container">
                <input type="text" placeholder="Cari disini">
                <button><i class="fas fa-search"></i></button>
            </div>
            </div>
            </div>
            <div class="table-container">
                <table class="table table-striped table-default mt-4">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Tanggal ditambahkan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1MK02</td>
                        <td>Gudeg</td>
                        <td>Makanan</td>
                        <td>15.000</td>
                        <td>50</td>
                        <td>14-10-2024 08:09</td>
                        <td>
                            <a class="btn btn-danger btn-sm" href=""> <span class="bx bxs-trash"></span> </a>
                            <a class="btn btn-info btn-sm" href=""> <span class="bx bxs-edit"></span> </a>
                        </td>
                      </tr>
                    </tbody>
                </table>
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
@endsection