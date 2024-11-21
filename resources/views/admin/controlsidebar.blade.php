<aside class="control-sidebar control-sidebar-light">
    <div class="p-3">
        <div class="keranjang">
            <h4>Keranjang<h4>
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
    <!-- Button trigger modal -->
    <button type="button" class="diskon mb-2" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus ml-2"></i>Tambahkan Diskon</button>
    <button type="button" class="proses"><a href="{{ url('/payment') }}">Proses Transaksi</a></button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white rounded-lg p-6 w-1/3">
                        <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-yellow-500">
                        <i class="fas fa-tags mr-2">
                        </i>
                        Discount Pesanan
                        </h2>
                        <button class="text-gray-500">
                        <i class="fas fa-times">
                        </i>
                        </button>
                        </div>
                        <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                        Masukkan jumlah diskon
                        </label>
                        <div class="flex items-center">
                        <input class="w-full p-2 border rounded-l" placeholder="0" type="text"/>
                        <span class="bg-gray-200 p-2 border rounded-r">
                        %
                        </span>
                        </div>
                        </div>
                        <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                        Masukkan kode voucher
                        </label>
                        <input class="w-full p-2 border rounded" placeholder="Kode Voucher" type="text"/>
                        </div>
                        <button class="bg-green-500 text-white px-4 py-2 rounded w-full">
                        Pakai Diskon
                        </button>
                    </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    
    <script>
        // JavaScript untuk menghitung total, mengelola diskon, dll.
    </script>
</aside>