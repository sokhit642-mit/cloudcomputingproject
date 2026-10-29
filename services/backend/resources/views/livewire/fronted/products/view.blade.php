<div>
    <section class="py-0">
        <div class="container-small">
            <!-- Breadcrumb navigation -->
            <nav class="mb-3" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item fw-normal"><a href="{{url('/')}}">@lang('product.home')</a></li>
                    <li class="breadcrumb-item fw-normal"><a href="#">{{$product->category->name}}</a></li>
                    <li class="breadcrumb-item truncate fw-normal"><a href="#">{{$product->name}}</a></li>
                </ol>
            </nav>

            <div class="row g-5 mb-5 mb-lg-8" data-product-details="data-product-details">
                <div class="col-12 col-lg-6">
                    <!-- Product images -->
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-2 col-lg-12 col-xl-2">
                            <div class="swiper-products-thumb swiper gap-2 swiper theme-slider overflow-visible d-flex flex-wrap flex-md-column">
                                @foreach ($product->productImages as $index => $image)
                                    <div class="thumbnail {{ $index === 0 ? 'active' : '' }}" data-bs-target="#productCarousel" data-bs-slide-to="{{ $index }}">
                                        <img src="{{ asset($image->image) }}" alt="Product Thumbnail {{ $index + 1 }}" class="rounded-3">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if ($product->productImages)
                            <div class="col-12 col-md-10 col-lg-12 col-xl-10">
                                <div class="d-flex align-items-center border border-translucent rounded-3 text-center h-100">
                                    <div class="swiper swiper theme-slider">
                                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($product->productImages as $index => $image)
                                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                        <img src="{{ asset($image->image) }}" class="d-block w-100 rounded-3" alt="Product Image {{ $index + 1 }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            No Images
                        @endif
                    </div>

                    <!-- Add to wishlist and add to cart buttons -->
                    <div class="d-flex">
                        <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn fw-normal btn-lg btn-outline-warning rounded-pill w-100 me-3 px-2 px-sm-4 fs-9 fs-sm-8">
                            <span wire:loading.remove wire:target="addToWishlist">
                                <i class="fa fa-heart"></i> @lang('product.add to wishlist')
                            </span>
                            <span wire:loading wire:target="addToWishlist">
                                @lang('product.adding...')
                            </span>
                        </button>
                        <button type="button" wire:click="addToCart({{ $product->id }})" class="btn fw-normal btn-lg btn-warning rounded-pill w-100 fs-9 fs-sm-8">
                            <span class="fas fa-shopping-cart me-2"></span>@lang('product.add to cart')
                        </button>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div>
                            <h3 class="mb-3 lh-sm fw-medium">{{ $product->name }}</h3>
                            <div class="d-flex flex-wrap align-items-center">
                                @if ($product->discount_type === 'fixed')
                                    @if ($product->discount_value)
                                        <p class="me-2 text-body text-decoration-line-through mb-0">${{$product->selling_price}}.00</p>
                                        <div class="d-flex gap-2">
                                            <h3 class="text-body fw-bold">${{$product->discounted_price}}.00
                                            </h3>
                                            <label class="text-success">-{{ $product->discount_value }}$ off</label>

                                        </div>
                                    @else
                                        <h3 class="text-body fw-bold mb-0">${{$product->selling_price}}.00</h3>
                                    @endif
                                @else
                                    @if ($product->discount_value)
                                        <p class="me-2 text-body text-decoration-line-through mb-0">${{$product->selling_price}}.00</p>
                                        <div class="d-flex gap-2">
                                            <h3 class="text-body fw-bold">${{$product->discounted_price}}.00
                                            </h3>
                                            <label class="text-success">{{ $product->discount_value }}% off</label>

                                        </div>
                                        
                                    @else
                                        <h3 class="text-body fw-bold mb-0">${{$product->selling_price}}.00</h3>
                                    @endif
                                @endif
                            </div>
                            <img src="{{ Storage::url($product->brand->image) }}" width="8%" alt=""  class=" border p-1 rounded-1">

                            {{-- @if ($product->quantity > 0)
                                <p class="badge badge-phoenix fs-10 badge-phoenix-success mt-2">@lang('product.instock')</p>
                            @else
                                <p class="badge badge-phoenix fs-10 badge-phoenix-danger mt-2">@lang('product.outofstock')</p>
                            @endif --}}

                            <!-- Size selection -->
                            <div class="mt-2">
                                @if ($product->productSizes)
                                    @foreach ($product->productSizes as $sizeItem)
                                        <input type="radio" class="btn-check" wire:model="productSizeId" name="sizeSelection" id="size-{{ $sizeItem->id }}" value="{{ $sizeItem->id }}" autocomplete="off">
                                        <label wire:click='sizeSelected({{ $sizeItem->id }})' class="btn btn-outline-primary" for="size-{{ $sizeItem->id }}"> {{ $sizeItem->size->name }}</label>
                                    @endforeach
                                @endif
                                <div>
                                    @if ($this->productSizeSelectedQuantity == 'out of stock')
                                        <span class="badge text-bg-danger fw-normal fs-10 product-verified-badge">@lang('product.outofstock')<span class="ms-1" data-feather="x" style="height:10px;width:12.8px;"></span></span>
                                    @elseif($this->productSizeSelectedQuantity > 0)
                                        <span class="badge text-bg-success fw-normal fs-10 product-verified-badge">@lang('product.instock')<svg class="svg-inline--fa fa-check ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fas fa-check ms-1"></span> Font Awesome fontawesome.com --></span>
                                    @endif
                                </div>
                                
                            </div>

                            <!-- Color selection -->
                            <div class="mt-2 mb-2 d-flex flex-wrap gap-2">
                                @if ($product->productColors)
                                    @foreach ($product->productColors as $colorItem)
                                        <div class="radio-wrapper-21">
                                            <input id="color-{{ $colorItem->color->name }}" wire:model="productColorId" type="radio" name="colorSelection" value="{{ $colorItem->color->id }}">
                                            <label wire:click='colorSelected({{ $colorItem->id }})' for="color-{{ $colorItem->color->name }}" style="background-color:{{ $colorItem->color->code }};"></label>
                                        </div>
                                    @endforeach
                                @else
                                <p>No color</p>
                                @endif
                               
                               
                            </div>
                            <div class="mb-2" style="margin-top: -10px;">
                                @if ($this->productColorSelectedQuantity == 'out of stock')
                                    <span class="badge text-bg-danger fw-normal fs-10 product-verified-badge">@lang('product.outofstock')<span class="ms-1" data-feather="x" style="height:10px;width:12.8px;"></span></span>
                                @elseif($this->productColorSelectedQuantity > 0)
                                    <span class="badge text-bg-success fw-normal fs-10 product-verified-badge">@lang('product.instock')<svg class="svg-inline--fa fa-check ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fas fa-check ms-1"></span> Font Awesome fontawesome.com --></span>
                                @endif
                            </div>
                            <!-- Quantity selection -->
                            <div class="col-12 col-sm">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="d-flex flex-between-center" data-quantity="data-quantity">
                                        <button wire:click="decrementQuantity" class="btn btn-phoenix-primary px-3" data-type="minus"><span class="fas fa-minus"></span></button>
                                        <input wire:model="quantityCount" readonly class="form-control text-center input-spin-none bg-transparent border-0 outline-none" style="width:50px;" type="number" value="{{ $this->quantityCount }}" />
                                        <button wire:click="incrementQuantity" class="btn btn-phoenix-primary px-3" data-type="plus"><span class="fas fa-plus"></span></button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product description -->
                            <div class="mt-3">
                                <h5 class="mb-0">@lang('product.smalldescription')</h5>
                                <p class="mb-2 text-body-secondary mt-2">{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-0">
        <div class="container-small">
            <div class="row g-4 mb-6">
                <div class="col-12 col-lg-12 col-xxl-10">
                  <div class="d-flex flex-between-center mb-3">
                    <h3 class=" fw-medium">
                        Related
                        @if ($category)
                            {{ $category->name}}
                        @endif
                        Products
                    </h3>
                    {{-- <a class="fw-bold d-none d-md-block" href="{{ url('/all-products') }}">Explore more<svg class="svg-inline--fa fa-chevron-right fs-9 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right fs-9 ms-1"></span> Font Awesome fontawesome.com --></a> --}}
                  </div>
                  <div class="swiper-theme-container products-slider">
                    <div class="swiper theme-slider swiper-initialized swiper-horizontal swiper-backface-hidden" data-swiper="{&quot;slidesPerView&quot;:1,&quot;spaceBetween&quot;:16,&quot;breakpoints&quot;:{&quot;450&quot;:{&quot;slidesPerView&quot;:2,&quot;spaceBetween&quot;:16},&quot;768&quot;:{&quot;slidesPerView&quot;:3,&quot;spaceBetween&quot;:20},&quot;1200&quot;:{&quot;slidesPerView&quot;:4,&quot;spaceBetween&quot;:16},&quot;1540&quot;:{&quot;slidesPerView&quot;:5,&quot;spaceBetween&quot;:16}}}">
                      <div class="swiper-wrapper" id="swiper-wrapper-104e13b102210473981" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); transition-delay: 0ms;">
                        
                          @forelse ($category->relatedproductsCategory as $relatedproductsItem)
                            @if($product->id != $relatedproductsItem->id)
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 6" style="width: 216.667px; margin-right: 20px;">
                                <div class="position-relative text-decoration-none product-card h-100">
                                  <div class="d-flex flex-column justify-content-between h-100">
                                    <div>
                                      <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                       
                                        @if ($relatedproductsItem->productImages->count() > 0)
                                          <img class="img-fluid rounded-3" src="{{ asset($relatedproductsItem->productImages[0]->image) }}" alt="{{$relatedproductsItem->name}}">
                                          {{-- @if ($relatedproductsItem->quantity > 0)
                                            <span class="badge text-bg-success fw-normal fs-10 product-verified-badge">@lang('product.instock')<svg class="svg-inline--fa fa-check ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fas fa-check ms-1"></span> Font Awesome fontawesome.com --></span>
                                          @else
                                            <span class="badge text-bg-danger fw-normal fs-10 product-verified-badge">@lang('product.outofstock')<span class="ms-1" data-feather="x" style="height:10px;width:12.8px;"></span></span>
                                          @endif --}}
                                        @endif
                                      </div>
                                      {{-- <livewire:fronted.index-brands-image :brand="$brand" /> --}}
                                      <a class="stretched-link" href="{{ url('/collections/'.$relatedproductsItem->category->slug.'/'.$relatedproductsItem->slug) }}">
                                        <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $relatedproductsItem->name}}</h6>
                                      </a>
                                      </a>
                                      {{-- <p class="fs-9"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><span class="text-body-quaternary fw-semibold ms-1">(67 people rated)</span></p> --}}
                                    </div>
                                    <div>
                                      {{-- <p class="fs-9 text-body-highlight fw-bold mb-2">dbrand skin available</p> --}}
                                      <div class="d-flex align-items-center mb-1">
                                        @if ($relatedproductsItem->discount_type === 'fixed')
                                            @if ($relatedproductsItem->discount_value)
                                                <p class="me-2 text-body text-decoration-line-through mb-0">${{$relatedproductsItem->selling_price}}.00</p>
                                                <div class="d-flex gap-2">
                                                    <h3 class="text-body fw-bold">${{$relatedproductsItem->discounted_price}}.00
                                                    </h3>
                                                    <label class="text-success">-{{ $relatedproductsItem->discount_value }}$ off</label>
        
                                                </div>
                                            @else
                                                <h3 class="text-body fw-bold mb-0">${{$relatedproductsItem->selling_price}}.00</h3>
                                            @endif
                                        @else
                                            @if ($relatedproductsItem->discount_value)
                                                <p class="me-2 text-body text-decoration-line-through mb-0">${{$relatedproductsItem->selling_price}}.00</p>
                                                <div class="d-flex gap-2">
                                                    <h3 class="text-body fw-bold">${{$relatedproductsItem->discounted_price}}.00
                                                    </h3>
                                                    <label class="text-success">{{ $relatedproductsItem->discount_value }}% off</label>
        
                                                </div>
                                                
                                            @else
                                                <h3 class="text-body fw-bold mb-0">${{$relatedproductsItem->selling_price}}.00</h3>
                                            @endif
                                        @endif
                                      </div>
                                      {{-- <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">2 colors</p> --}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endif
                            
                          @empty
                          <div class="col-md-12">
                              <div class="p-2">
                                  <h4>@lang('product.no products availiable')</h4>
                              </div>
                          </div>
                          @endforelse
                    
                      </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                    <div class="swiper-nav swiper-product-nav">
                      <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-104e13b102210473981" aria-disabled="false"><svg class="svg-inline--fa fa-chevron-right nav-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right nav-icon"></span> Font Awesome fontawesome.com --></div>
                      <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-104e13b102210473981" aria-disabled="true"><svg class="svg-inline--fa fa-chevron-left nav-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"></path></svg><!-- <span class="fas fa-chevron-left nav-icon"></span> Font Awesome fontawesome.com --></div>
                    </div>
                  </div><a class="fw-bold d-md-none px-0" href="#!">Explore more<svg class="svg-inline--fa fa-chevron-right fs-9 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right fs-9 ms-1"></span> Font Awesome fontawesome.com --></a>
                </div>
                
              </div>
        </div>
    </section>

    <section class="py-0">
        <div class="container-small">
            <div class="row g-4 mb-6">
                <div class="col-12 col-lg-12 col-xxl-10">
                  <div class="d-flex flex-between-center mb-3">
                    <h3 class=" fw-medium">
                        Related
                        @if ($product)
                            {{ $product->brand->name}}
                        @endif
                        Products
                    </h3>
                    {{-- <a class="fw-bold d-none d-md-block" href="{{ url('/all-products') }}">Explore more<svg class="svg-inline--fa fa-chevron-right fs-9 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right fs-9 ms-1"></span> Font Awesome fontawesome.com --></a> --}}
                  </div>
                  <div class="swiper-theme-container products-slider">
                    <div class="swiper theme-slider swiper-initialized swiper-horizontal swiper-backface-hidden" data-swiper="{&quot;slidesPerView&quot;:1,&quot;spaceBetween&quot;:16,&quot;breakpoints&quot;:{&quot;450&quot;:{&quot;slidesPerView&quot;:2,&quot;spaceBetween&quot;:16},&quot;768&quot;:{&quot;slidesPerView&quot;:3,&quot;spaceBetween&quot;:20},&quot;1200&quot;:{&quot;slidesPerView&quot;:4,&quot;spaceBetween&quot;:16},&quot;1540&quot;:{&quot;slidesPerView&quot;:5,&quot;spaceBetween&quot;:16}}}">
                      <div class="swiper-wrapper" id="swiper-wrapper-104e13b102210473981" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); transition-delay: 0ms;">
                        
                        @forelse ($category->relatedproductsBrand as $relatedproductsItem)
                        @if ($relatedproductsItem->brand == "$product->brand")
                            @if($product->id != $relatedproductsItem->id)
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 6" style="width: 216.667px; margin-right: 20px;">
                                <div class="position-relative text-decoration-none product-card h-100">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                        
                                        @if ($relatedproductsItem->productImages->count() > 0)
                                            <img class="img-fluid rounded-3" src="{{ asset($relatedproductsItem->productImages[0]->image) }}" alt="{{$relatedproductsItem->name}}">
                                            {{-- @if ($relatedproductsItem->quantity > 0)
                                            <span class="badge text-bg-success fw-normal fs-10 product-verified-badge">@lang('product.instock')<svg class="svg-inline--fa fa-check ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fas fa-check ms-1"></span> Font Awesome fontawesome.com --></span>
                                            @else
                                            <span class="badge text-bg-danger fw-normal fs-10 product-verified-badge">@lang('product.outofstock')<span class="ms-1" data-feather="x" style="height:10px;width:12.8px;"></span></span>
                                            @endif --}}
                                        @endif
                                        </div>
                                        {{-- <livewire:fronted.index-brands-image :brand="$brand" /> --}}
                                        <a class="stretched-link" href="{{ url('/collections/'.$relatedproductsItem->category->slug.'/'.$relatedproductsItem->slug) }}">
                                        <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $relatedproductsItem->name}}</h6>
                                        </a>
                                        </a>
                                        {{-- <p class="fs-9"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><span class="text-body-quaternary fw-semibold ms-1">(67 people rated)</span></p> --}}
                                    </div>
                                    <div>
                                        {{-- <p class="fs-9 text-body-highlight fw-bold mb-2">dbrand skin available</p> --}}
                                        <div class="d-flex align-items-center mb-1">
                                        {{-- <p class="me-2 text-body text-decoration-line-through mb-0">${{$relatedproductsItem->original_price}}.00</p>
                                        <h3 class="text-body-emphasis mb-0">${{$relatedproductsItem->selling_price}}.00</h3> --}}
                                            @if ($relatedproductsItem->discount_type === 'fixed')
                                                @if ($relatedproductsItem->discount_value)
                                                    <p class="me-2 text-body text-decoration-line-through mb-0">${{$relatedproductsItem->selling_price}}.00</p>
                                                    <div class="d-flex gap-2">
                                                        <h3 class="text-body fw-bold">${{$relatedproductsItem->discounted_price}}.00
                                                        </h3>
                                                        <label class="text-success">-{{ $relatedproductsItem->discount_value }}$ off</label>
            
                                                    </div>
                                                @else
                                                    <h3 class="text-body fw-bold mb-0">${{$relatedproductsItem->selling_price}}.00</h3>
                                                @endif
                                            @else
                                                @if ($relatedproductsItem->discount_value)
                                                    <p class="me-2 text-body text-decoration-line-through mb-0">${{$relatedproductsItem->selling_price}}.00</p>
                                                    <div class="d-flex gap-2">
                                                        <h3 class="text-body fw-bold">${{$relatedproductsItem->discounted_price}}.00
                                                        </h3>
                                                        <label class="text-success">{{ $relatedproductsItem->discount_value }}% off</label>
            
                                                    </div>
                                                    
                                                @else
                                                    <h3 class="text-body fw-bold mb-0">${{$relatedproductsItem->selling_price}}.00</h3>
                                                @endif
                                            @endif
                                        </div>
                                        {{-- <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">2 colors</p> --}}
                                    </div>
                                    </div>
                                </div>
                                </div>
                            @endif
                    
                            
                        @endif
                        @empty
                        <div class="col-md-12">
                        <div class="p-2">
                            <h4>@lang('product.no products availiable')</h4>
                        </div>
                        </div>
                        
                        @endforelse
                          
                      </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                    <div class="swiper-nav swiper-product-nav">
                      <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-104e13b102210473981" aria-disabled="false"><svg class="svg-inline--fa fa-chevron-right nav-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right nav-icon"></span> Font Awesome fontawesome.com --></div>
                      <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-104e13b102210473981" aria-disabled="true"><svg class="svg-inline--fa fa-chevron-left nav-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"></path></svg><!-- <span class="fas fa-chevron-left nav-icon"></span> Font Awesome fontawesome.com --></div>
                    </div>
                  </div><a class="fw-bold d-md-none px-0" href="#!">Explore more<svg class="svg-inline--fa fa-chevron-right fs-9 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right fs-9 ms-1"></span> Font Awesome fontawesome.com --></a>
                </div>
                
              </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        $(function(){
            $("#exzoom").exzoom({
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                "autoPlay": false,
                "autoPlayTimeout": 2000
            });
        });
    </script>
@endpush
