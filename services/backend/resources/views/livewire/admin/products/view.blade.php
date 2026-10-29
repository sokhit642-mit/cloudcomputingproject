<div>
    <nav class="navbar navbar-expand-lg bg-white rounded-2">
        <div class="container-fluid">
         
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-6">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbar-ex-6">
            <div class="navbar-nav me-auto" style="margin-left: -14px;">
                <div class="title">
                    <input type="text" wire:model='search' class="form-control" placeholder="@lang('admin_dash.search_product')...">
                </div>
              
            </div>
            <ul class="navbar-nav ms-lg-auto gap-2" style="margin-right: -14px;">
             
              <li class="nav-item">
                <div class="btn-group">
                    <button type="button" class="btn btn-label-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Views</button>
                    <ul class="dropdown-menu" style="">
                      <li><a class="dropdown-item" href="{{ url('admin/products-cart') }}">card</a></li>
                      <li><a class="dropdown-item" href="{{ url('admin/products') }}">List</a></li>
                     
                      
                    </ul>
                  </div>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/products/create') }}" type="button"  class="btn btn-label-primary">
                    <i class="bi bi-plus-square me-2"></i> @lang('admin_dash.add_product')
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br>
    <div>
        <div wire:ignore.self class="modal fade" id="verticalycentered" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title align-items-center"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <br>
                <br>
                <center>
                    <h1 class="text-warning"><i class="bi bi-exclamation-triangle fa-2x"></i></h1>
                    <form wire:submit.prevent='destroyProducts'>
                    <div class="modal-body">
                        <h3>@lang('admin_dash.are_you_sure')</h3>
                        <p>@lang('admin_dash.you want to delete this product !')</p>
                    </div>
                    <br>
                    <div class="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('admin_dash.cancel')</button>
                        <button type="submit" class="btn btn-danger"  data-bs-dismiss="modal">@lang('admin_dash.delete')</button>
                    </div>
                    </form>
                </center>
                <br>
                <br>
                </div>
            </div>
            </div>
    </div>
    <div class="row mb-12 g-4">
        @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 d-flex">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset($product->productImages[0]->image) }}" alt="Card image cap">
                    <div class="card-body border-top">
                        <h5 class="card-title truncate1">{{ $product->name }}</h5>
                        <div class="d-flex gap-2">
                            <h6 class="card-title p-2 bg-label-secondary rounded-2 align mt-1">{{ $product->category->name }}</h6>
                            <h6 class="card-title p-2 bg-label-secondary rounded-2 text-center mt-1">
                                <img src="{{ Storage::url($product->brand->image) }}" class="" width="60%" alt="">
                            </h6>
                            <h6 class="card-title p-2 bg-label-secondary rounded-2  mt-1">{{ $product->quantity }}</h6>
                            <h6 class="card-title p-2 bg-label-secondary rounded-2  mt-1">${{ $product->selling_price }}.00</h6>
                            <h6 class="card-title p-2 bg-label-{{ $product->status ? 'danger' :  'success'}} rounded-2 mt-1">
                                {{ $product->status == '1' ? ' Hidden':' Visible' }}
                            </h6>
                        </div>
                      
                    </div>
                    <div class="card-footer border-top">
                        <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-label-primary">Edit</a>
                        <button type="button"  wire:click="deleteProduct({{ $product->id}})" class="btn btn-label-danger float-end" data-bs-toggle="modal" data-bs-target="#verticalycentered">Delete</button>
                    </div>
                </div>
                
            </div>
        @endforeach
    </div>
    
</div>
