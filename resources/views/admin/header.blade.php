<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
<li class="navbar-nav">
    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
</li>
  
<head>
<script src="jquery-3.7.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
    <!-- SEARCH FORM -->
    <form class="form-inline mx-auto" id="searchForm">
      <div class="input-group w-500">
        <input class="seacrh form-control form-control-navbar" id="searchInput" type="search" placeholder="Search" aria-label="Search">
        <div id="searchResult"></div>
        <div class="input-group-append">
          <button class="btn btn-navbar" id="addItemButton" type="submit" data-id="{{$data->id}}" data-nama="{{$data->nama}}" data-harga="{{$data->harga}}" data-image="{{ asset('/storage/produks/'.$data->image) }}">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-cart-plus fa-2x"></i></a>
            <span class="spn">0</span>
      </li>
    </ul>
  </nav>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    var data = []

    $(document).on('click', '#addItemButton', function() {
      var item = {
        id: $(this).attr("data-id"),
        nama: $(this).attr("data-nama"),
        harga: $(this).attr("data-harga"),
        image: $(this).attr("data-image")
      };
      data.push(item); 
      console.log(data)// Menambahkan item ke array data
    });

    var searchInput = document.getElementById('searchInput');
    var searchResult = document.getElementById('searchResult');

    searchInput.addEventListener('input', function() {
            var query = this.value.toLowerCase();
            searchResult.innerHTML = ''; // Clear previous results

            if (query) {
                var filteredData = data.filter(function(item) {
                    return item.nama.toLowerCase().includes(query);
                });
                filteredData.forEach(function(item) {
                    var resultDiv = document.createElement('div'); // Create a new div for each result
                    resultDiv.classList.add('result');
                    resultDiv.textContent = item.nama + ' - Harga: ' + item.harga;
                    searchResult.appendChild(resultDiv);
                });
            }
        });
  </script>
  <!-- /.navbar -->
