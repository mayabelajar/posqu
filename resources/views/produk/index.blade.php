@extends('admin.sidebar')

@section('content')
    <title>Daftar Produk</title>
    <div class="container">
        <div class="card">
            <h2>List Product</h2>
            <div class="row mt-3">
            <div class="col-sm-4">
            <div class="filter-buttons">
                <button class="active">Semua</button>
                <button>Makanan</button>
                <button>Minuman</button>
                <button>Camilan</button>
            </div>
            </div>
            <div class="col-sm-4">
            <div class="search-container">
                <input type="text" placeholder="Cari disini">
                <button><i class="bx bx-search"></i></button>
            </div>
            </div>
            <div class="col-sm-4">
              <div class="plus">
                <a class="btn btn-primary btn-md" href="{{ route('produks.create') }}"> <span class="bx bx-list-plus"></span></a>
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
                      @foreach ($produks as $data)
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->kategori}}</td>
                        <td>{{$data->harga}}</td>
                        <td>{{$data->stok}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>
                          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('produks.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('produks.edit', $data->id) }}" class="btn btn-info btn-sm"> <span class="bx bxs-edit"></span> </a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><span class="bx bx-trash"></span></button>
                            <!-- <a href="" class="btn btn-danger btn-sm"> <span class="bx bxs-trash"></span> </a> -->
                          </form>
                        </td>
                      </tr>
                      @endforeach
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