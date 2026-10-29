<div>
    <section class="pt-1 pb-9 ">
        <div class="product-filter-container">
            <button class="btn btn-sm btn-phoenix-secondary text-body-tertiary fw-bold mb-5  d-lg-none" data-phoenix-toggle="offcanvas" data-phoenix-target="#productFilterColumn"><svg class="svg-inline--fa fa-filter me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"></path></svg><!-- <span class="fa-solid fa-filter me-2"></span> Font Awesome fontawesome.com -->Filter</button>
            <div class="row">
                <div class="col-lg-3 col-xxl-2 ps-2 ps-xxl-3">
                  <div wire:ignore.self class="phoenix-offcanvas-filter bg-body scrollbar phoenix-offcanvas phoenix-offcanvas-fixed "  data-bs-scroll="true" data-bs-backdrop="false" id="productFilterColumn" style="top: 120px">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h3 class="mb-0 fw-bold">Filters</h3>
                      <button class="btn d-lg-none p-0 btn-close text-reset" data-phoenix-dismiss="offcanvas">
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                    <a class="btn px-0 d-block collapse-indicator" data-bs-toggle="collapse" href="#collapsePriceRange" role="button" aria-expanded="true" aria-controls="collapsePriceRange">
                        <div class="d-flex align-items-center justify-content-between w-100">
                          <div class="fs-8 text-body-highlight">@lang('product.search')</div><svg class="svg-inline--fa fa-angle-down toggle-icon text-body-quaternary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg><!-- <span class="fa-solid fa-angle-down toggle-icon text-body-quaternary"></span> Font Awesome fontawesome.com -->
                        </div>
                    </a>
                    <div class="collapse show" id="collapsePriceRange" style="">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="input-group me-2">
                                <input class="form-control" wire:model='search' type="text" aria-label="First name" placeholder="@lang('product.search')">
                                
                            </div>
                        </div>
                    </div>
                    <a class="btn px-0 d-block collapse-indicator" data-bs-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="true" aria-controls="collapseAvailability">
                      <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="fs-8 text-body-highlight">@lang('product.brands')</div><svg class="svg-inline--fa fa-angle-down toggle-icon text-body-quaternary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg><!-- <span class="fa-solid fa-angle-down toggle-icon text-body-quaternary"></span> Font Awesome fontawesome.com -->
                      </div>
                    </a>
                    <div class="collapse show " id="collapseBrand">
                      <div class="mb-2">
                       
                            @foreach ($brand as $brandItem)
                                <div class="form-check mb-0">
                                    <input class="form-check-input mt-0" wire:model="brandInputs" id="{{ $brandItem->id }}" value="{{ $brandItem->id }}" type="checkbox">
                                    <label class="form-check-label d-block lh-sm fs-8 text-body fw-normal mb-0" for="{{ $brandItem->id }}">{{ $brandItem->name }}</label>
                                </div>
                            @endforeach
                       
                        
                      </div>
                    </div>
                    <a class="btn px-0 d-block collapse-indicator" data-bs-toggle="collapse" href="#collapseSubcategory" role="button" aria-expanded="true" aria-controls="collapseSubcategory">
                      <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="fs-8 text-body-highlight">@lang('product.subcategory')</div><svg class="svg-inline--fa fa-angle-down toggle-icon text-body-quaternary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg><!-- <span class="fa-solid fa-angle-down toggle-icon text-body-quaternary"></span> Font Awesome fontawesome.com -->
                      </div>
                    </a>
                    <div class="collapse show" id="collapseSubcategory">
                      <div class="mb-2">
                        @if(!empty($subcategories))
                            @foreach ($subcategories as $subcateItem)
                            <div class="form-check mb-0">
                                <input class="form-check-input mt-0" wire:model="subcateInputs" id="{{ $subcateItem->name}}" value="{{$subcateItem->name}}" type="checkbox" name="color">
                                <label class="form-check-label d-block lh-sm fs-8 text-body fw-normal mb-0" for="{{ $subcateItem->name}}">{{ $subcateItem->name}}</label>
                            </div> 
                                    
                            @endforeach
                        @else
                            <p>No subcategorys available</p>
                        @endif
                        
                    </div>
                    </div><a class="btn px-0 d-block collapse-indicator" data-bs-toggle="collapse" href="#collapsePrices" role="button" aria-expanded="true" aria-controls="collapsePrices">
                      <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="fs-8 text-body-highlight">@lang('product.prices')</div><svg class="svg-inline--fa fa-angle-down toggle-icon text-body-quaternary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg><!-- <span class="fa-solid fa-angle-down toggle-icon text-body-quaternary"></span> Font Awesome fontawesome.com -->
                      </div>
                    </a>
                    <div class="collapse show" id="collapsePrices">
                      <div class="mb-2">
                        <div class="form-check mb-0">
                          <label class="d-block">
                            <input type="radio" class="form-check-input" name="priceSort" wire:model="priceInputs" value="high-to-low"> @lang('product.high_to_low')
                          </label>
                          <label class="d-block">
                            <input type="radio" class="form-check-input" name="priceSort" wire:model="priceInputs" value="low-to-high"> @lang('product.low_to_high')
                          </label>
                        </div>
                       
                      </div>
                    </div>
                    
                  </div>
                  <div class="phoenix-offcanvas-backdrop d-lg-none" data-phoenix-backdrop="" style="top: 92px"></div>
                </div>
                <div class="col-lg-9 col-xxl-10">
                  <div class="row gx-3 gy-6 mb-8">
                    @if(!empty($products))
                        @forelse ($products as $productItem)
                            <div class="col-12 col-sm-6 col-md-4 col-xxl-2">
                            <div class="product-card-container h-100">
                                
                                <div class="position-relative text-decoration-none product-card h-100">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div>
                                        
                                            <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" wire:click='addToWishlist({{ $productItem->id }})' data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add to wishlist" data-bs-original-title="Add to wishlist">
                                                    {{-- <button type="button" wire:click='addToWishlist({{ $productItem->id }})' class="btn btn-light"> 
                                                        <span  wire:loading.remove wire:target='addToWishlist({{ $productItem->id }})'>
                                                            <i class="bi bi-heart-fill"></i>
                                                        </span>
                                                        <span wire:loading wire:target='addToWishlist({{ $productItem->id }})'>
                                                            <i class="bi bi-heart-fill"></i> Adding...
                                                        </span>
                                                        
                                                    </button> --}}
                                                    <svg class="svg-inline--fa fa-heart d-block-hover" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5625em;">
                                                        <g transform="translate(256 256)"><g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                                            <path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" transform="translate(-256 -256)"></path>
                                                        </g></g>
                                                    </svg><!-- <span class="fas fa-heart d-block-hover" data-fa-transform="down-1"></span> Font Awesome fontawesome.com -->
                                                    <svg class="svg-inline--fa fa-heart d-none-hover" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5625em;"><g transform="translate(256 256)"><g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                                        <path fill="currentColor" d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" transform="translate(-256 -256)">
                                                        </path></g></g>
                                                    </svg><!-- <span class="far fa-heart d-none-hover" data-fa-transform="down-1"></span> Font Awesome fontawesome.com -->
                                                </button>
                                                @if ($productItem->productImages->count() > 0)
                                                    <img class="img-fluid rounded-3" src="{{ asset($productItem->productImages[0]->image) }}" alt="{{$productItem->name}}">
                                                    @if ($productItem->productSizes->isNotEmpty() || $productItem->productColors->isNotEmpty())
                                                        @php
                                                            // Calculate total quantity for sizes and colors
                                                            $totalSizeQuantity = $productItem->productSizes->sum('quantity');
                                                            $totalColorQuantity = $productItem->productColors->sum('quantity');
                                                            $totalQuantity = $totalSizeQuantity + $totalColorQuantity;
                                                        @endphp

                                                        @if ($totalQuantity > 0)
                                                            <span class="badge text-bg-success fw-normal fs-10 product-verified-badge">
                                                                @lang('product.instock')
                                                                <svg class="svg-inline--fa fa-check ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                                    <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                                                                </svg>
                                                            </span>
                                                        @else
                                                            <span class="badge text-bg-danger fw-normal fs-10 product-verified-badge">
                                                                @lang('product.outofstock')
                                                                <span class="ms-1" data-feather="x" style="height:10px;width:12.8px;"></span>
                                                            </span>
                                                        @endif
                                                    @elseif ($productItem->quantity > 0)
                                                        <span class="badge text-bg-success fw-normal fs-10 product-verified-badge">
                                                            @lang('product.instock')
                                                            <svg class="svg-inline--fa fa-check ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                                <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                                                            </svg>
                                                        </span>
                                                    @else
                                                        <span class="badge text-bg-danger fw-normal fs-10 product-verified-badge">
                                                            @lang('product.outofstock')
                                                            <span class="ms-1" data-feather="x" style="height:10px;width:12.8px;"></span>
                                                        </span>
                                                    @endif


                                                
                                                    
                                                    {{-- @if ($productItem->quantity > 0)
                                                        <span class="badge text-bg-success fw-normal fs-10 product-verified-badge">@lang('product.instock')<svg class="svg-inline--fa fa-check ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fas fa-check ms-1"></span> Font Awesome fontawesome.com --></span>
                                                    @else
                                                        <span class="badge text-bg-danger fw-normal fs-10 product-verified-badge">@lang('product.outofstock')<span class="ms-1" data-feather="x" style="height:10px;width:12.8px;"></span></span>

                                                    @endif --}}
                                                @endif
                                            </div>
                                            <p class="fs-9 text-body-tertiary mb-2"><img src="{{ Storage::url($productItem->brand->image) }}" width="10%" alt=""></p>
                                            <a class="stretched-link" href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                            <h6 class="mb-2 lh-sm line-clamp-3 fw-medium product-name">{{$productItem->name}}</h6>
                                            </a>
                                    
                                        {{-- <p class="fs-9"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><span class="text-body-quaternary fw-semibold ms-1">(67 people rated)</span></p> --}}
                                    </div>
                                    <div>

                                    <div class="d-flex align-items-center mb-1">
                                        {{-- <p class="me-2 text-body text-decoration-line-through mb-0">${{$productItem->original_price}}.00</p>
                                        <h3 class="text-body fw-bold mb-0">${{$productItem->selling_price}}.00</h3> --}}
                                        @if ($productItem->discount_type === 'fixed')
                                            @if ($productItem->discount_value)
                                                <p class="me-2 text-body text-decoration-line-through mb-0">${{$productItem->selling_price}}.00</p>
                                                <div class="d-flex gap-2">
                                                    <h3 class="text-body fw-bold">${{$productItem->discounted_price}}.00
                                                    </h3>
                                                    <label class="text-success">-{{ $productItem->discount_value }}$ off</label>
    
                                                </div>
                                            @else
                                                <h3 class="text-body fw-bold mb-0">${{$productItem->selling_price}}.00</h3>
                                            @endif
                                        @else
                                            @if ($productItem->discount_value)
                                                <p class="me-2 text-body text-decoration-line-through mb-0">${{$productItem->selling_price}}.00</p>
                                                <div class="d-flex gap-2">
                                                    <h3 class="text-body fw-bold">${{$productItem->discounted_price}}.00
                                                    </h3>
                                                    <label class="text-success">{{ $productItem->discount_value }}% off</label>
    
                                                </div>
                                               
                                            @else
                                                <h3 class="text-body fw-bold mb-0">${{$productItem->selling_price}}.00</h3>
                                            @endif
                                        @endif
                                       
                                    </div>
                                    <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">
                                        {{-- {{$productItem->productSize->name}} --}}
                                    </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="p-2">
                                    <h4>@lang('product.no products availiable')</h4>
                                </div>
                            </div>
                        @endforelse
                    @else
                        <p>@lang('product.no products availiable')</p>
                    @endif
                  </div>
                  
                </div>
              </div>
        </div><!-- end of .container-->
      </section>
</div>
{{-- <div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between">
            <h4 class="mb-4 mt-1">Products</h4>
            <div class=" float-end">
                <input type="search" wire:model='search' class="form-control" placeholder="search product...">
            </div>
            
        </div>
        <hr style="width: 1300px; padding:5px;margin-left:10px;">
        
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="position-sticky" style="top: 5rem;">
             
      
              <div>
                
                <div class="list-unstyled">
                    <div class="card" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                        <div class="card-body">
                            <h6 class="card-title border-bottom pb-2">Brands</h6>
                            <p class="card-text">
                                @foreach ($category->brands as $brandItem)
                                
                                <label class="d-block">
                                    <div class="checkbox-wrapper-4">
                                        <input class="inp-cbx" wire:model="brandInputs" id="{{ $brandItem->name}}" value="{{$brandItem->name}}" type="checkbox"/>
                                        <label class="cbx" for="{{ $brandItem->name}}"><span>
                                        <svg width="12px" height="10px">
                                          <use xlink:href="#check-4"></use>
                                        </svg></span><span>{{ $brandItem->name}}</span></label>
                                        <svg class="inline-svg">
                                          <symbol id="check-4" viewbox="0 0 12 10">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                          </symbol>
                                        </svg>
                                    </div>
                                   
                                </label>
                            @endforeach
                            </p>
                            <footer class="blockquote-footer">
                                <small class="text-muted">
                                  Check <cite title="Source Title">brans</cite> to fine your products.
                                </small>
                              </footer>
                        </div>
                        
                    </div>
                    <div class="card mt-2" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                        
                        <div class="card-body" >
                            @foreach ($category->subcategories as $subcateItem)
                                
                                <label class="d-block">
                                    <div class="checkbox-wrapper-4">
                                        <input class="inp-cbx" wire:model="subcateInputs" id="{{ $subcateItem->name}}" value="{{$subcateItem->name}}" type="checkbox"/>
                                        <label class="cbx" for="{{ $subcateItem->name}}"><span>
                                        <svg width="12px" height="10px">
                                          <use xlink:href="#check-4"></use>
                                        </svg></span><span>{{ $subcateItem->name}}</span></label>
                                        <svg class="inline-svg">
                                          <symbol id="check-4" viewbox="0 0 12 10">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                          </symbol>
                                        </svg>
                                    </div>
                                      
                                </label>
                            @endforeach
    
                        </div>
                    </div>
                    <div class="card mt-2" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                        <div class="card-body">
                            <h6 class="card-title border-bottom pb-2">Price</h6>
                            <p class="card-text">
                                <label class="d-block">
                                    <input type="radio" class="form-check-input" name="priceSort" wire:model="priceInputs" value="high-to-low"> High to low
                                </label>
                                <label class="d-block">
                                    <input type="radio" class="form-check-input" name="priceSort" wire:model="priceInputs" value="low-to-high"> Low to High
                                </label>
                            </p>
                            
                        </div>
                        
                        
                    </div>
                </div>
              </div>
      
              
            </div>
        </div>
        <div class="col-md-9 pt-1">
          
    
          <article>
            <div class="row">
                @forelse ($products as $productItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($productItem->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                @endif
            
                                @if ($productItem->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        <img class="rounded" style="border-radius: 25px;" src="{{ asset($productItem->productImages[0]->image) }}" alt="{{$productItem->name}}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    {{$productItem->name}}
                                </a>
                                </h5>
                            
                                <div>
                                    <span class="selling-price">${{$productItem->original_price}}</span>
                                    <span class="original-price">${{$productItem->original_price}}</span>
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn-light"><i class="bi bi-cart3"></i></a>
                                    <button type="button" wire:click='addToWishlist({{ $productItem->id }})' class="btn btn-light"> 
                                        <span  wire:loading.remove wire:target='addToWishlist({{ $productItem->id }})'>
                                            <i class="bi bi-heart-fill"></i>
                                        </span>
                                        <span wire:loading wire:target='addToWishlist({{ $productItem->id }})'>
                                            <i class="bi bi-heart-fill"></i> Adding...
                                        </span>
                                        
                                    </button>
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="btn btn-light"> View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Availiable for {{ $category->name }}.</h4>
                        </div>
                    </div>
                @endforelse
            </div>
          </article>
    
          
        </div>
    
        
      </div>
</div> --}}

