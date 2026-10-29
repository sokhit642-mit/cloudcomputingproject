@extends('layouts.app')
@section('title','Home Page')


@section('content')
<div class="container px-xl-0 px-xxl-3 " style="margin-top: -60px;">
  <div id="myCarousel" class="carousel mb-6 slide carousel-fade mt-10 " style="carousel:margin-bottom: 4rem;"
    data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active"
        aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
    </div>
    <div class="carousel-inner">
      @foreach ($sliders as $key => $sliderItem)
      <div class="carousel-item {{ $key == 0 ? 'active':'' }}" style="height: 32rem;">
        <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                
                </svg> -->
        @if ($sliderItem->image)
        <img src="{{ asset('uploads/slider/'.$sliderItem->image) }}" class="bd-placeholder-img cover rounded-3"
          width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        @endif
        <div class="container" style="margin-top: 12cm;;">
          <div class="carousel-caption text-start" style=" bottom: 30rem;z-index: 10;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">

            <h1 class=" text-light">{!! $sliderItem->title !!}</h1>
            <p>{{ $sliderItem->description }}</p>
            <p><a class="btn btn-lg btn-sm btn-primary fw-normal" href="{{ url('/all-products') }}">@lang('home.learn more_menu')</a></p>
          </div>
        </div>

      </div>
      @endforeach


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<hr>
<livewire:fronted.index :brand="$brand" />


<hr style="margin-top: 1px;">


<div class="mb-6 mt-7 container">
  <div class="d-flex flex-between-center mb-3">
    <h3 class="fw-bold">@lang('home.products_menu')</h3>
    <a class="fw-bold d-none d-md-block" href="{{ url('/all-products') }}">@lang('home.ex_more')<svg class="svg-inline--fa fa-chevron-right fs-9 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right fs-9 ms-1"></span> Font Awesome fontawesome.com --></a>
  </div>
  <div class="col-lg-12">
    <div class="row gx-3 gy-6 mb-8">
      @if(!empty($products))
          @forelse ($products as $productItem)
              <div class="col-6 col-sm-12 col-md-3">
              <div class="product-card-container h-100">
                  
                  <div class="position-relative text-decoration-none product-card h-100">
                  <div class="d-flex flex-column justify-content-between h-100">
                    <div>
                      <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                     
                        {{-- <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add to wishlist" data-bs-original-title="Add to wishlist"><svg class="svg-inline--fa fa-heart d-block-hover" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5625em;"><g transform="translate(256 256)"><g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-heart d-block-hover" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-heart d-none-hover" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5625em;"><g transform="translate(256 256)"><g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="far fa-heart d-none-hover" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></button> --}}
                        @if ($productItem->productImages->count() > 0)
                          <img class="img-fluid rounded-3" src="{{ asset($productItem->productImages[0]->image) }}" alt="{{$productItem->name}}">
                          {{-- @if ($productItem->quantity > 0)
                            <span class="badge text-bg-success fw-normal fs-10 product-verified-badge">@lang('product.instock')<svg class="svg-inline--fa fa-check ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fas fa-check ms-1"></span> Font Awesome fontawesome.com --></span>
                          @else
                            <span class="badge text-bg-danger fw-normal fs-10 product-verified-badge">@lang('product.outofstock')<span class="ms-1" data-feather="x" style="height:10px;width:12.8px;"></span></span>
                          @endif --}}
                        @endif
                      </div>
                      {{-- <livewire:fronted.index-brands-image :brand="$brand" /> --}}
                      <img src="{{ Storage::url($productItem->brand->image) }}" width="12%" alt=""  class=" border p-1 rounded-1">
                      <a class="stretched-link" href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                        <h6 class="mb-2 lh-sm line-clamp-3 product-name fw-semibold">{{ $productItem->name}}</h6>
                      </a>
                      {{-- <p class="fs-9"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><span class="text-body-quaternary fw-semibold ms-1">(64 people rated)</span></p> --}}
                    </div>
                      <div>

                      <div class="d-flex align-items-center mb-1">
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
 
    <a class="fw-bold d-md-none" href="#!">@lang('home.ex_more')<svg class="svg-inline--fa fa-chevron-right fs-9 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right fs-9 ms-1"></span> Font Awesome fontawesome.com --></a>
    <div class="row g-4 mb-6">
      <div class="col-12 col-lg-12 col-xxl-10">
        <div class="d-flex flex-between-center mb-3">
          <h3 class=" fw-bold">@lang('home.new_av')</h3><a class="fw-bold d-none d-md-block" href="{{ url('/newArrivals') }}">@lang('home.ex_more')<svg class="svg-inline--fa fa-chevron-right fs-9 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right fs-9 ms-1"></span> Font Awesome fontawesome.com --></a>
        </div>
        <div class="swiper-theme-container products-slider">
          <div class="swiper theme-slider swiper-initialized swiper-horizontal swiper-backface-hidden" data-swiper="{&quot;slidesPerView&quot;:1,&quot;spaceBetween&quot;:16,&quot;breakpoints&quot;:{&quot;450&quot;:{&quot;slidesPerView&quot;:2,&quot;spaceBetween&quot;:16},&quot;768&quot;:{&quot;slidesPerView&quot;:3,&quot;spaceBetween&quot;:20},&quot;1200&quot;:{&quot;slidesPerView&quot;:4,&quot;spaceBetween&quot;:16},&quot;1540&quot;:{&quot;slidesPerView&quot;:5,&quot;spaceBetween&quot;:16}}}">
            <div class="swiper-wrapper" id="swiper-wrapper-104e13b102210473981" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); transition-delay: 0ms;">
              @if(!empty($newArrivalProduct))
                @forelse ($newArrivalProduct as $productItem)
                  <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 6" style="width: 216.667px; margin-right: 20px;">
                    <div class="position-relative text-decoration-none product-card h-100">
                      <div class="d-flex flex-column justify-content-between h-100">
                        <div>
                          <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                            <div class=" border-1 rounded-1 bg-success mt-3 px-2 text-white fs-10" style="position: absolute;margin-left:220px;">New</div>
                            @if ($productItem->productImages->count() > 0)
                              <img class="img-fluid rounded-3" src="{{ asset($productItem->productImages[0]->image) }}" alt="{{$productItem->name}}">
                              {{-- @if ($productItem->quantity > 0)
                                <span class="badge text-bg-success fw-normal fs-10 product-verified-badge">@lang('product.instock')<svg class="svg-inline--fa fa-check ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fas fa-check ms-1"></span> Font Awesome fontawesome.com --></span>
                              @else
                                <span class="badge text-bg-danger fw-normal fs-10 product-verified-badge">@lang('product.outofstock')<span class="ms-1" data-feather="x" style="height:10px;width:12.8px;"></span></span>
                              @endif --}}
                            @endif
                          </div>
                          {{-- <livewire:fronted.index-brands-image :brand="$brand" /> --}}
                          <img src="{{ Storage::url($productItem->brand->image) }}" width="12%" alt=""  class=" border p-1 rounded-1">

                          <a class="stretched-link" href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                            <h6 class="mb-2 lh-sm line-clamp-3 product-name fw-semibold">{{ $productItem->name}}</h6>
                          </a>
                          </a>
                          {{-- <p class="fs-9"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><span class="text-body-quaternary fw-semibold ms-1">(67 people rated)</span></p> --}}
                        </div>
                        <div>
                          {{-- <p class="fs-9 text-body-highlight fw-bold mb-2">dbrand skin available</p> --}}
                          <div class="d-flex align-items-center mb-1">
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
                          {{-- <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">2 colors</p> --}}
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
          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
          <div class="swiper-nav swiper-product-nav">
            <div class="swiper-button-next mt-5" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-104e13b102210473981" aria-disabled="false"><svg class="svg-inline--fa fa-chevron-right nav-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right nav-icon"></span> Font Awesome fontawesome.com --></div>
            <div class="swiper-button-prev swiper-button-disabled mt-5" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-104e13b102210473981" aria-disabled="true"><svg class="svg-inline--fa fa-chevron-left nav-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"></path></svg><!-- <span class="fas fa-chevron-left nav-icon"></span> Font Awesome fontawesome.com --></div>
          </div>
        </div>
        <a class="fw-bold d-md-none px-0" href="#!">@lang('home.ex_more')<svg class="svg-inline--fa fa-chevron-right fs-9 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right fs-9 ms-1"></span> Font Awesome fontawesome.com --></a>
      </div>
      
    </div>
    <div class="row g-4 mb-6">
      <div class="col-12 col-lg-12 col-xxl-10">
        <div class="d-flex flex-between-center mb-3">
          <h3 class=" fw-bold">@lang('home.trending')</h3><a class="fw-bold d-none d-md-block" href="{{ url('/trending') }}">@lang('home.ex_more')<svg class="svg-inline--fa fa-chevron-right fs-9 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right fs-9 ms-1"></span> Font Awesome fontawesome.com --></a>
        </div>
        <div class="swiper-theme-container products-slider">
          <div class="swiper theme-slider swiper-initialized swiper-horizontal swiper-backface-hidden" data-swiper="{&quot;slidesPerView&quot;:1,&quot;spaceBetween&quot;:16,&quot;breakpoints&quot;:{&quot;450&quot;:{&quot;slidesPerView&quot;:2,&quot;spaceBetween&quot;:16},&quot;768&quot;:{&quot;slidesPerView&quot;:3,&quot;spaceBetween&quot;:20},&quot;1200&quot;:{&quot;slidesPerView&quot;:4,&quot;spaceBetween&quot;:16},&quot;1540&quot;:{&quot;slidesPerView&quot;:5,&quot;spaceBetween&quot;:16}}}">
            <div class="swiper-wrapper" id="swiper-wrapper-104e13b102210473981" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); transition-delay: 0ms;">
              @if(!empty($trendingProducts))
                @forelse ($trendingProducts as $productItem)
                  <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 6" style="width: 216.667px; margin-right: 20px;">
                    <div class="position-relative text-decoration-none product-card h-100">
                      <div class="d-flex flex-column justify-content-between h-100">
                        <div>
                          <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                           
                            @if ($productItem->productImages->count() > 0)
                              <img class="img-fluid rounded-3" src="{{ asset($productItem->productImages[0]->image) }}" alt="{{$productItem->name}}">
                              {{-- @if ($productItem->quantity > 0)
                                <span class="badge text-bg-success fw-normal fs-10 product-verified-badge">@lang('product.instock')<svg class="svg-inline--fa fa-check ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fas fa-check ms-1"></span> Font Awesome fontawesome.com --></span>
                              @else
                                <span class="badge text-bg-danger fw-normal fs-10 product-verified-badge">@lang('product.outofstock')<span class="ms-1" data-feather="x" style="height:10px;width:12.8px;"></span></span>
                              @endif --}}
                            @endif
                          </div>
                          {{-- <livewire:fronted.index-brands-image :brand="$brand" /> --}}
                          <img src="{{ Storage::url($productItem->brand->image) }}" width="12%" alt=""  class=" border p-1 rounded-1">

                          <a class="stretched-link" href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                            <h6 class="mb-2 lh-sm line-clamp-3 product-name fw-semibold">{{ $productItem->name}}</h6>
                          </a>
                          </a>
                          {{-- <p class="fs-9"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><span class="text-body-quaternary fw-semibold ms-1">(67 people rated)</span></p> --}}
                        </div>
                        <div>
                          {{-- <p class="fs-9 text-body-highlight fw-bold mb-2">dbrand skin available</p> --}}
                          <div class="d-flex align-items-center mb-1">
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
                          {{-- <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">2 colors</p> --}}
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
          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
          <div class="swiper-nav swiper-product-nav">
            <div class="swiper-button-next mt-5" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-104e13b102210473981" aria-disabled="false"><svg class="svg-inline--fa fa-chevron-right nav-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right nav-icon"></span> Font Awesome fontawesome.com --></div>
            <div class="swiper-button-prev swiper-button-disabled mt-5" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-104e13b102210473981" aria-disabled="true"><svg class="svg-inline--fa fa-chevron-left nav-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"></path></svg><!-- <span class="fas fa-chevron-left nav-icon"></span> Font Awesome fontawesome.com --></div>
          </div>
        </div>
        <a class="fw-bold d-md-none px-0" href="#!">@lang('home.ex_more')<svg class="svg-inline--fa fa-chevron-right fs-9 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right fs-9 ms-1"></span> Font Awesome fontawesome.com --></a>
      </div>
      
    </div>
  </div>
 


<div class="container my-5">
  <div class="row flex-center mb-15 mt-11 gy-6">
    <div class="col-auto"><img class="d-dark-none" src="../../../assets/img/spot-illustrations/light_30.png" alt="" width="305"><img class="d-light-none" src="../../../assets/img/spot-illustrations/dark_30.png" alt="" width="305"></div>
    <div class="col-auto">
      <div class="text-center text-lg-start">
        <h3 class="text-body-highlight mb-2"><span class="fw-semibold">@lang('home.Want to have the ultimate customer experience?')</span></h3>
        <h1 class="display-3 fw-semibold mb-4 mt-1">@lang('home.Become a member today!')</h1><a class="btn btn-lg btn-primary px-7" href="{{ route('login') }}">@lang('login.singup')<svg class="svg-inline--fa fa-chevron-right ms-2 fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right ms-2 fs-9"></span> Font Awesome fontawesome.com --></a>
      </div>
    </div>
  </div>
</div>

@endsection