<div>
    <div class="container-small">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fw-normal"><a href="{{url('/')}}">@lang('brands.home')</a></li>
                <li class="breadcrumb-item fw-normal"><a href="{{url('/brands')}}">@lang('brands.all brands')</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Default</li> --}}
            </ol>
        </nav>
        <h2 class="mb-1 pb-1 fw-normal">@lang('brands.choose brand')</h2>
        <p class="mb-5 text-body-tertiary fw-normal">@lang('brands.to display products')</p>
        <div class="row gx-3 gy-5">
            @forelse ($brand as $brandItem)
            
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4 bg-white" style="height:180px;">
                    <a href="{{ url('/brands/'.$brandItem->slug) }}">
                        <img class="mw-100" src="{{ Storage::url($brandItem->image) }}"
                        alt="{{ $brandItem->name }}">
                    </a>
                </div>
                <div class="category-card-body">
                    <a href="{{ url('/brands/'.$brandItem->slug) }}" style="cursor:pointer">
                        <h5 class="mb-2 text-center">{{ $brandItem->name }}</h5>
                    </a>
    
                </div>
    
                {{-- <div class="mb-1 fs-9"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true"
                        focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                        </path>
                    </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg
                        class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                        data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                        </path>
                    </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg
                        class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                        data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                        </path>
                    </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg
                        class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                        data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                        </path>
                    </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg
                        class="svg-inline--fa fa-star text-warning-light" data-bs-theme="light" aria-hidden="true"
                        focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z">
                        </path>
                    </svg>
                    <!-- <span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span> Font Awesome fontawesome.com -->
                </div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(1263 people rated)</p> --}}
                {{-- <a class="btn btn-link p-0" href="#!">Visit Store<svg
                        class="svg-inline--fa fa-chevron-right ms-1 fs-10" aria-hidden="true" focusable="false"
                        data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                        </path>
                    </svg><!-- <span class="fas fa-chevron-right ms-1 fs-10"></span> Font Awesome fontawesome.com --></a>
                --}}
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                    {{-- <div class="btn-reveal-trigger"><button
                            class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1"
                            type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                            aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs-9"
                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                </path>
                            </svg>
                            <!-- <span class="fas fa-ellipsis-h fs-9"></span> Font Awesome fontawesome.com --></button>
                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a
                                class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                    </div> --}}
                </div>
            </div>
            @empty
            <h5>No Category Available.</h5>
            @endforelse
        </div>
    </div>
</div>
