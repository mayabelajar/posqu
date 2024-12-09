@extends('admin.sidebar')

@section('content')
<form action="{{ route('produks.store') }}" method="GET" enctype="multipart/form-data">
    <title>Daftar Produk</title>
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
              <div id="product-categories">
              <form method="GET" action="{{ route('produks.index') }}" id="Semua" style="display:inline;">
                  <button class="kategori" type="submit">
                      <span class="tulis">Semua</span>
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
        console.log("Document ready, initializing Database...");

        $('#data_table').DataTable({
          "paging": true,
          "searching": true,
          "lengthChange": true,
          "pageLength": 10,
          "language": {
            "lengthMenu": "_MENU_ items per page", // Custom text
            "zeroRecords": "No records found", // Custom not found message
            "info": "Showing _START_ to _END_ of _TOTAL_ entries", // Custom info text
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)"
          }
        });
        let kategoriAktif = localStorage.getItem("kategori");
        
        if (kategoriAktif) {
          $("#" + kategoriAktif).addClass('active');
        }


        $(".kategori").click(function () {
          let buttonId = $(this).attr('id');

          
          $(".kategori").removeClass('active');
          // Tandai tombol yang diklik
          $(this).addClass('active');
          // Perbarui URL dengan parameter kategori yang diklik
          localStorage.setItem("kategori", buttonId);

        });
      });
    </script>

<!-- <script>
  // Function to update active button
function updateActiveButton(category) {
  const buttons = document.querySelectorAll('.btn');
  buttons.forEach((btn) => {
    if (btn.dataset.category === category) {
      btn.classList.add('active');
    } else {
      btn.classList.remove('active');
    }
  });
}

// Event listener for button clicks
document.querySelectorAll('.btn').forEach((btn) => {
  btn.addEventListener('click', () => {
    const selectedCategory = btn.dataset.category;

    // Save selected category to localStorage
    localStorage.setItem('selectedCategory', selectedCategory);

    // Update button styles
    updateActiveButton(selectedCategory);
  });
});

// Load the active button when the page is loaded
window.addEventListener('DOMContentLoaded', () => {
  const savedCategory = localStorage.getItem('selectedCategory') || 'semua';
  updateActiveButton(savedCategory);
});

</script> -->


  <!-- <script>
  $(document).ready(function () {
    // Ambil parameter 'kategori' dari URL
    $('#data_table').DataTable({
          "paging": true,
          "searching": true,
          "lengthChange": true,
          "pageLength": 10,
          "language": {
            "lengthMenu": "_MENU_ items per page", // Custom text
            "zeroRecords": "No records found", // Custom not found message
            "info": "Showing _START_ to _END_ of _TOTAL_ entries", // Custom info text
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)"
          }
      }); 
    const params = new URLSearchParams(window.location.search);
    const kategori = params.get("kategori");

    // Reset semua tombol ke keadaan default
    $(".kategori").removeClass("active");

    // Tambahkan kelas 'active' ke tombol yang sesuai
    if (kategori) {
      $("#" + kategori).addClass("active");
    } else {
      $("#Semua").addClass("active");
    }

    // Event klik pada tombol
    $(".kategori").click(function () {
      // Ambil ID tombol yang diklik
      const buttonId = $(this).attr("id");

      // Ubah URL dengan kategori yang diklik
      window.location.href = "?kategori=" + buttonId;
      });
    });
  </script> -->


@endsection