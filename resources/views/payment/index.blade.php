
<html>
 <head>
 <script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>
   Payment Page
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-[#e8e3c9] flex justify-center items-center h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg w-[800px]">
   <div class="grid grid-cols-2 gap-8">
    <div>
     <h2 class="text-xl font-bold mb-4">
      Choose Payment Method
     </h2>
     <div class="border border-yellow-500 p-4 rounded-lg mb-4">
      <div class="flex items-center mb-4">
       <input class="mr-2" id="cash" name="payment" type="radio"/>
       <label class="flex items-center" for="cash">
        Cash
       </label>
      </div>
      <div class="grid grid-cols-2 gap-4">
       <div>
        <label class="block text-sm" for="total-payment">
         Total Pembayaran
        </label>
        <input class="border border-yellow-500 rounded-lg w-full p-2" id="total-payment" type="text"/>
       </div>
       <div>
        <label class="block text-sm" for="total-money">
         Total Uang
        </label>
        <input class="border border-yellow-500 rounded-lg w-full p-2" id="total-money" type="text"/>
       </div>
      </div>
     </div>
     <div class="border border-yellow-500 p-4 rounded-lg mb-4 row">
     <div class="radio-group">
     <div class="flex items-center">
        <input class="mr-2" id="cash" name="payment" type="radio"/>
        <label for="cash"> 
      <img src="{{ asset('/lte/dist/img/qris.PNG') }}" height="80" width="80"/>
     </div>
     </div>
     </div>
     <div class="border-t border-yellow-500 mb-4">
     </div>
     <div class="border border-yellow-500 p-4 rounded-lg">
      <label class="block mb-2">
       Meja
      </label>
      <div class="flex items-center mb-2">
       <input class="mr-2" id="indoor" name="table" type="radio"/>
       <label class="flex items-center" for="indoor">
        Indoor
       </label>
       
      <div class="flex items-center ml-5">
       <input class="mr-2" id="outdoor" name="table" type="radio"/>
       <label class="flex items-center" for="outdoor">
        Outdoor
       </label>
      </div>
      </div>
     </div>
    </div>
    <div>
     <h2 class="text-xl font-bold mb-4">
      Order Summary
     </h2>
     <div class="border-b border-yellow-500 mb-4">
     <div class="flex justify-between mb-2">
       <span>
        Rujak Cingur
       </span>
       <span>
        2 x
       </span>
       <span>
        Rp 12.000
       </span>
      </div>
      <div class="flex justify-between mb-2">
       <span>
        Es Dawet
       </span>
       <span>
        1 x
       </span>
       <span>
        Rp 16.000
       </span>
      </div>
      <div class="flex justify-between mb-2">
       <span>
        Cenil
       </span>
       <span>
        2 x
       </span>
       <span>
        Rp 10.000
       </span>
      </div>
      </div>
     <div class="mb-4">
      <div class="flex justify-between mb-2">
       <span>
        Subtotal
       </span>
       <span>
        Rp 38.000
       </span>
      </div>
      <div class="flex justify-between mb-2">
       <span>
        Discount
       </span>
       <span>
        50%
       </span>
      </div>
      <div class="flex justify-between mb-2">
       <span>
        No. Table
       </span>
       <span>
        Indoor 01
       </span>
      </div>
     </div>
     <div class="border-t border-yellow-500 mb-4">
     </div>
     <div class="flex justify-between mb-4">
      <span>
       Total
      </span>
      <span>
       Rp 19.000
      </span>
     </div>
     <div class="flex justify-between items-center">
      <span>
       Rp 19.000
      </span>
      <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
       Bayar
      </button>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>


     </div>
    </div>
   </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 </body>
</html>