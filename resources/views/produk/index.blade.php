@extends('admin.sidebar')

@section('content')
<form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
    <title>Daftar Produk</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="container">
        <div class="card">
            <h2>List Product</h2>
            <!-- <div class="row mt-3">
              <div class="col-sm">
              
              </div>
            </div> -->
            <div class="row mt-3 mb-3">
            <div class="col-sm-6">
            <div class="filter-buttons">
                <form method="GET" action="{{ route('produks.index') }}" id="Semua" style="display:inline;">
                    <button class="kategori" type="submit">
                        Semua
                    </button>
                </form>
              <form method="GET" action="{{ route('produks.index') }}" id="Makanan" style="display:inline;">
                <button class="kategori" type="submit" name="kategori" value="Makanan">
                  <span class="tulis">Makanan</span>
                </button>
              </form>
              <form method="GET" action="{{ route('produks.index') }}" id="Minuman" style="display:inline;">
                <button class="kategori" type="submit" name="kategori" value="Minuman">
                  <span class="tulis">Minuman</span>
                </button>
              </form>
              <form method="GET" action="{{ route('produks.index') }}" id="Camilan" style="display:inline;">
                <button class="kategori" type="submit" name="kategori" value="Camilan">
                  <span class="tulis">Camilan</span>
                </button>
              </form>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="plus">
                <a class="btn btn-plus btn-md py-2 iconplus bx bx-list-plus" href="{{ route('produks.create') }}"> <span>Tambahkan Produk</span></a>
              </div>
            </div>
            </div>
            <div class="table-container">
                <table id="data_table" class="table table-striped table-default mt-4">
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
                <!-- <div class="flex justify-between items-center mt-4">
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
                </div> -->
            </div>
        </div>
    </div>

    <script>
  $(document).ready(function() {
    // Ambil parameter 'kategori' dari URL
    let params = new URLSearchParams(window.location.search);
    let kategori = params.get("kategori");

    // Setel ulang semua tombol ke status default
    $(".kategori").css('background-color', 'white');
    $(".kategori").find(".tulis").css('color', '#F6C029');

    // Jika ada parameter kategori di URL, tandai tombol yang sesuai
    if (kategori) {
      $("#" + kategori).css('background-color', '#F6C029');
      $("#" + kategori).find(".tulis").css('color', 'white');
    }

    // Event klik pada tombol kategori
    $(".kategori").click(function () {
      let buttonId = $(this).attr('id');

      // Reset semua tombol kategori
      $(".kategori").css('background-color', 'white');
      $(".kategori").find(".tulis").css('color', '#F6C029');

      // Tandai tombol yang diklik
      $(this).css('background-color', '#F6C029');
      $(this).find(".tulis").css('color', 'white');

      // Perbarui URL dengan parameter kategori yang diklik
      window.location.href = "?kategori=" + buttonId;
    });
  });
</script>


  <!-- <script>
  $(document).ready(function () {
    // Ambil parameter 'kategori' dari URL
    let params = new URLSearchParams(window.location.search);
    let kategori = params.get("kategori");

    // Reset semua tombol ke keadaan default
    $(".kategori").removeClass("active");

    // Tambahkan kelas 'active' ke tombol yang sesuai
    if (kategori) {
      $("#" + kategori).addClass("active");
    }

    // Event klik pada tombol
    $(".kategori").click(function () {
      // Ambil ID tombol yang diklik
      let buttonId = $(this).attr("id");

      // Ubah URL dengan kategori yang diklik
      window.location.href = "?kategori=" + buttonId;
      });
    });
  </script> -->


@endsection