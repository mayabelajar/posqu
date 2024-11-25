<aside class="control-sidebar control-sidebar-light">
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
        <div class="flex justify-between items-center mb-2">
            <img class="gambar1" src="{{ asset('/lte/dist/img/rujakcingur.jpeg') }}">
            <span>Rujak Cingur</span>
            <button class="krj"><i class="fa fa-plus-circle"></i></button>
            <button class="krj"><i class="fa fa-minus-circle"></i></button>
            <span>Rp12.000</span>
        </div>
        <div class="flex justify-between items-center mb-2">
            <img class="gambar2" src="{{ asset('/lte/dist/img/rendang.jpeg') }}">
            <span>Rendang</span>
            <button class="krj"><i class="fa fa-plus-circle"></i></button>
            <button class="krj"><i class="fa fa-minus-circle"></i></button>
            <span>Rp48.000</span>  
        </div>
        <div class="flex justify-between items-center mb-2">
            <img class="gambar3" src="{{ asset('/lte/dist/img/ayambetutu.jpeg') }}">
            <span>Ayam Betutu</span>
            <button class="krj"><i class="fa fa-plus-circle"></i></button>
            <button class="krj"><i class="fa fa-minus-circle"></i></button>
            <span>Rp35.000</span>
        </div>
    </div>
    <div class="notes">
        <label for="notes">Catatan :</label>
        <textarea class="form-control mb-4" name="notes" rows="4"></textarea>
    </div>
    <div class="border-t border-gray-250 mb-3">
    </div>
    <div class="flex justify-between mb-3">
      <span>
       <b>Total</b>
      </span>
      <span>
       <b>Rp 19.000</b>
      </span>
     </div>
     <div>
     <button type="button"><a href="{{ url('/payment') }}" class="proses">Proses Transaksi</a></button>
     </div>
    
    <script>
        // JavaScript untuk menghitung total, mengelola diskon, dll.
    </script>
</aside>