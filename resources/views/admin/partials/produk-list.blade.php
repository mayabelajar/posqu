<div class="container text-center"> <!-- container -->
              <div class="row"> <!--row -->
              @foreach ($produks as $data)
                <div class="col-3"> <!-- col -->
                  <div class="card" style="width: 100%;"  > <!-- card -->
                    <div class="row"> 
                      <div class="col-5">
                      <img src="{{ asset('/storage/produks/'.$data->image) }}" class="rounded-circle mb-2" width="80px" alt="">
                      </div>
                      <div class="col-7 mb-5 items-center">
                      <div class="card-body"> <!-- card body -->
                        <div class="card-title mb-1">{{$data->nama}}</div>
                      </div>
                      <div class="row">
                      <div class="col-8 mb-1">
                        <div class="card-harga mb-1">Rp{{$data->harga}}</div>
                      </div>
                      <div class="col-4">
                        <button type="button" class="tmbl btn btn-icon tambahkeranjang" 
                          data-id="{{$data->id}}" 
                          data-nama="{{$data->nama}}" 
                          data-harga="{{$data->harga}}" 
                          data-image="{{ asset('/storage/produks/'.$data->image) }}">
                          <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        </button> 
                      </div>
                      </div>
                    </div>
                    </div> <!-- card body -->
                  </div> <!-- card -->
                </div> <!-- col -->
                @endforeach
              </div> <!-- row -->
            </div> <!-- container -->