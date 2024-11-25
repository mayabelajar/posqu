<!-- <aside class="control-sidebar control-sidebar-light">
    <div class="p-3">
        <div class="keranjang">
            <h4><b>Keranjang</b><h4>
        </div>
        <title>Keranjang Belanja</title>

        <style>
            /* Gaya CSS di sini */
            body {
                font-family: Arial, sans-serif;
            }
            .item {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }
            .quantity {
                width: 20px;    
                text-align: center;
            }
            .price {
                text-align: right;
            }
        </style>



        <div class="pemesanan mb-4">
        @foreach ($produks as $data)
        <div class="flex justify-between items-center mb-2">
            <img class="gambar1" src="{{ asset('/storage/produks/'.$data->image) }}">
            <span>{{$data->nama}}</span>
            <button class="krj"><i class="fa fa-plus-circle"></i></button>
            <button class="krj"><i class="fa fa-minus-circle"></i></button>
            <span>{{$data->harga}}</span>
        </div>
        @endforeach
    </div>
    <div class="notes">
        <label for="notes">Catatan :</label>
        <textarea class="form-control mb-4" name="notes" rows="4"></textarea>
    </div>
    <div class="border-t border-gray-250 mb-3">
    </div>
    <div class="flex justify-between mb-3">
      <ul class="listCard"></ul>
      <div class="checkout"></div>
            <div class="total">0</div>
     </div>
     <div>
     <button type="button"><a href="{{ url('/payment') }}" class="proses">Proses Transaksi</a></button>
     </div>
     
    <script src="ini.js">
        // JavaScript untuk menghitung total, mengelola diskon, dll. 
    </script>
</aside> -->