<div class="container text-center">
        <div class="row">
          @foreach ($produks as $data)
          <div class="col-3">
            <div class="card" style="width: 100%;">
              <div class="row align-items-center">
                <div class="col-5 text-center">
                  <img src="{{ asset('/storage/produks/'.$data->image) }}" class="rounded-circle mb-2" width="55px" alt="">
                </div>
                <div class="col-7">
                  <div class="d-flex flex-column">
                    <div class="card-title mb-2">{{$data->nama}}</div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="card-harga">Rp{{$data->harga}}</div>
                      <button type="button" class="tmbl btn btn-icon btn-sm ms-2" 
                        data-id="{{$data->id}}" 
                        data-nama="{{$data->nama}}" 
                        data-harga="{{$data->harga}}" 
                        data-image="{{ asset('/storage/produks/'.$data->image) }}">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>