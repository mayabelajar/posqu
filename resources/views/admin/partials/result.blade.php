@if($produks->isEmpty())
    <p>No products found.</p>
@else
    <div class="row"> <!-- Menggunakan row untuk Bootstrap -->
        @foreach($produks as $data)
            <div class="col-md-3 col-sm-6 col-12 mb-4"> <!-- Responsive col -->
                <div class="card" style="width: 100%;"> <!-- card -->
                    <img src="{{ asset('/storage/produks/'.$data->image) }}" class="card-img-top rounded-circle mx-auto my-3" width="100px" alt="{{ $data->nama }}">
                    <div class="card-body"> <!-- card body -->
                        <h5 class="card-title">{{ $data->nama }}</h5>
                        <h5 class="card-title">Rp{{ number_format($data->harga, 0, ',', '.') }}</h5>
                        <button type="button" class="btn btn-success">Beli Sekarang</button>
                        <button type="button" id="tambahkeranjang" class="tmbl btn btn-icon" data-id="{{ $data->id }}" data-nama="{{ $data->nama }}" data-harga="{{ $data->harga }}" data-image="{{ asset('/storage/produks/'.$data->image) }}">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i> Tambah Keranjang
                        </button> 
                    </div> <!-- card body -->
                </div> <!-- card -->
            </div> <!-- col -->
        @endforeach
    </div>
@endif