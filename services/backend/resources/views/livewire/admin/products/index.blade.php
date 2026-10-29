<div>
    <section class="section dashboard">
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
        <div class="pagetitle">
            <div class="row" style="float: right;margin-top: 2px;">
                {{-- <nav>
                    <a href="{{ url('admin/category/create') }}" type="button" data-bs-original-title="Add New Category" data-bs-toggle="tooltip" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>
                </nav> --}}
            </div>
            {{-- <h1>Products</h1> --}}
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
                <li class="breadcrumb-item">@lang('admin_dash.product')</li>
               
                
              </ol>
              
            </nav>
            @if (session('message'))
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3500",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
    
                    toastr.success(@json(session('message')));
                });
              </script>
            @endif
              <div class="card">
                <div class="card-header" style="display: flex;justify-content: space-between;">
                  <div class="title">
                    <input type="text" wire:model='search' class="form-control" placeholder="@lang('admin_dash.search_product')...">
                  </div>
                  <div class=" d-flex gap-2">
                    <div class="title">
                     
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-label-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Views</button>
                      <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="{{ url('admin/products-cart') }}">card</a></li>
                        <li><a class="dropdown-item" href="{{ url('admin/products') }}">List</a></li>
                       
                        
                      </ul>
                    </div>
                    <a href="{{ url('admin/products/create') }}" type="button"  class="btn btn-label-primary">
                      <i class="bi bi-plus-square me-2"></i> @lang('admin_dash.add_product')
                    </a>
      
                  </div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="dt-multilingual table border-top dataTable no-footer dtr-column collapsed border-bottom">
                    <thead class="table-secondary">
                      <tr>
                        <th style="font-size: 12px;">#</th>
                        <th style="font-size: 12px;">@lang('admin_dash.product')</th>
                        {{-- <th style="font-size: 12px;">@lang('admin_dash.category')</th> --}}
                        <th style="font-size: 12px;">@lang('admin_dash.brand')</th>
                        {{-- <th >Sub-Category</th> --}}
                        <th style="font-size: 12px;">@lang('admin_dash.product_price')</th>
                        <th style="font-size: 12px;">Discount value</th>
                        <th style="font-size: 12px;">Discount</th>
                        <th style="font-size: 12px;">Qty</th>
                        <th style="font-size: 12px;">@lang('admin_dash.status')</th>
                        <th style="font-size: 12px;">@lang('admin_dash.action')</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @forelse ($products as $product)
                        <tr>
                          
                          <td style="vertical-align: middle;" scope="row">{{ $product->id }}</td>
                          <td style="vertical-align: middle;" class=" d-flex align-items-center" >
                            <div class="d-flex justify-content-start align-items-center product-name">
                              <div class="avatar-wrapper">
                                <div class="avatar avatar me-4 rounded-2 bg-label-secondary img-thumbnail">
                                  <img src="{{ asset($product->productImages[0]->image) }}" alt="Product-9" class="rounded border">
                                </div>
                              </div>
                              <div class="d-flex flex-column">
                                <h6 class="text-nowrap mb-0 mt-1 truncate1">{{ $product->name }}</h6>
                                <small class="text-truncate d-none d-sm-block truncate1">{{ $product->description }}</small>
                              </div>
                            </div>
                            {{-- <img class="img-thumbnail" id="rcorners2" width="50" style="margin-right: 10px" src="{{ asset($product->productImages[0]->image) }}" alt="">
                            <div class="truncate">{{ $product->name }}</div> --}}
                          </td>
                          {{-- <td style="vertical-align: middle;">
                            @if ($product->category)
                              {{ $product->category->name }}
                            @else
                                @lang('admin_dash.no_category_add')
                            @endif
                            
                          </td> --}}
                          <td  style="vertical-align: middle;">
                            <img src="{{ Storage::url($product->brand->image) }}" width="30%" alt="">
                            {{-- {{ $product->brand->name}} --}}
                          </td>
                          {{-- <td style="vertical-align: middle;">{{ $product->subcategory }}</td> --}}
                         
                          {{-- <td style="vertical-align: middle;"> 
                            @if ($product->size)
                            {{ $product->size }}
                            @else
                              No size
                            @endif
                          </td> --}}
                          <td style="vertical-align: middle;">${{ $product->selling_price }}.00</td>
                          <td style="vertical-align: middle;">
                           
                            @if ($product->discount_value)
                              @if ($product->discount_type === 'fixed')
                                <span class="badge rounded-pill bg-label-danger">-${{ $product->discount_value }} off</span>
                              @else
                                <span class="badge rounded-pill bg-label-danger">{{ $product->discount_value }}% off</span>
                              @endif
                              {{-- <span class="badge rounded-pill bg-label-danger">{{ $product->discount_value }}% off</span> --}}
                            @else
                              No discount
                            @endif
                          </td>

                          <td style="vertical-align: middle;"> ${{ number_format($product->discounted_price, 2) }}</td>
                          <td style="vertical-align: middle;">
                            @if ($product->productSizes && $product->productSizes->isNotEmpty() && $product->productColors && $product->productColors->isNotEmpty())
                                {{-- Handle the case where both sizes and colors exist --}}
                                {{ $product->productSizes->sum('quantity') + $product->productColors->sum('quantity') }}
                            @elseif ($product->productSizes && $product->productSizes->isNotEmpty())
                                {{-- If only sizes exist --}}
                                {{ $product->productSizes->sum('quantity') }}
                            @elseif ($product->productColors && $product->productColors->isNotEmpty())
                                {{-- If only colors exist --}}
                                {{ $product->productColors->sum('quantity') }}
                            @else
                                {{-- Fallback to product quantity --}}
                                {{ $product->quantity }}
                            @endif


                          </td>
                          <td style="vertical-align: middle;">
                            <span class="badge rounded-pill bg-label-{{ $product->status ? 'danger' :  'success'}} bg-label-{{ $product->status ? '<i class="bi bi-exclamation-octagon me-1"></i>' :  '<i class="bi bi-check-circle "></i>'}}">{{ $product->status == '1' ? ' Hidden':' Visible' }}</i></span>
                          </td>
                          <td style="vertical-align: middle;width:2cm;">
                            <div class="row gy-3">
                              <div class="col-lg-4 d-flex gap-1">
    
                                
                                <a href="{{ url('admin/products/'.$product->id.'/edit') }}" type="button" class="btn btn-icon btn-label-secondary">
                                  <i class='bx bx-edit' ></i>
                                </a>
                                <button type="button"  wire:click="deleteProduct({{ $product->id}})"  class="btn btn-icon btn-label-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                  <i class='bx bxs-trash' ></i>
                                </button>
                              </div>
                            </div>
                           
                          </td>
                        </tr>
                      @empty
                      <tr class="text-center">
                        <td colspan="8" style="color: rgb(255, 0, 0);">@lang('admin_dash.no products available!!')</td>
                      </tr>
                      @endforelse
                    </tbody>
                    
                  </div>
                  </table>
                  
                  <div> 
                    <ul class="pagination pagination-sm float-end" style="margin-right: 20px;">{{ $products->links() }}</ul>
                  </div>
                </div>
              </div>
           
           
          </div>
    </section>
</div>
