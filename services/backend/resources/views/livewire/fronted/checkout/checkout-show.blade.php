<div>
    <div class="container-small">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fw-normal"><a href="#!">@lang('checkout.home')</a></li>
                <li class="breadcrumb-item fw-normal"><a href="#!">Checkout</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Default</li> --}}
            </ol>
        </nav>
        <h2 class="mb-5 fw-medium">Check out</h2>
        @if ($this->totalProductAmount !=0)
        <div class="row justify-content-between">
            <div class="col-lg-7 col-xl-7">
                <div>
                    <hr class="">
                    <h3 class="mb-5 fw-medium">@lang('checkout.Basic information')</h3>
                    <div class="row g-4 mb-7">
                        
                      <div class="alert alert-subtle-warning alert-dismissible fade show" role="alert">
                        <strong class=" mb-2"><i class="bi bi-pen-fill me-2"></i>@lang('cart.note')</strong>
                        <p class=" fs-9 mb-1 mt-0">- @lang('checkout.All information must be entered.')</p>
                        <p class=" fs-9 mb-1 mt-0">- @lang('checkout.Must enter a phone number that uses Telegram to receive quick notifications')</p>
                        <p class=" fs-9 mb-1 mt-0">- @lang('checkout.Email is the email currently in use.')</p>
                        <p class=" fs-9 mb-1 mt-0">- @lang('checkout.The address is a real address.')</p>
                        

                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    
                        {{-- <div class="col-12">
                            <div class="row gx-lg-11">
                                <div class="col-md-auto">
                                    <div class="form-check"><input class="form-check-input" id="creditCard" type="radio"
                                            name="paymentMethod" checked="checked"><label
                                            class="form-check-label fs-8 text-body text-nowrap d-flex gap-2"
                                            for="creditCard">Credit card<img class="h-100"
                                                src="../../../assets/img/logos/visa.png" alt=""><img class="h-100"
                                                src="../../../assets/img/logos/discover.png" alt=""><img class="h-100"
                                                src="../../../assets/img/logos/mastercard.png" alt=""><img class="h-100"
                                                src="../../../assets/img/logos/american_express.png" alt=""></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-auto">
                                    <div class="form-check"><input class="form-check-input" id="paypal" type="radio"
                                            name="paymentMethod"><label class="form-check-label fs-8 text-body"
                                            for="paypal">Paypal </label></div>
                                </div>
                                <div class="col-12 col-md-auto">
                                    <div class="form-check"><input class="form-check-input" id="coupon" type="radio"
                                            name="paymentMethod"><label class="form-check-label fs-8 text-body"
                                            for="coupon">Coupon </label></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-6" wire:ignore.self>
                            <label class="form-label fs-8 text-body-highlight ps-0 text-transform-none fw-normal"
                                for="inputCardNumber">@lang('checkout.full_name')</label>
                            <input wire:ignore.self class="form-control"  wire:model.defer='fullname' id="fullname" type="text"
                                placeholder="@lang('checkout.full_name')">
                            @error('fullname')
                            <small class="text-danger">@lang('checkout.The full name field is required')</small>
                            @enderror
                            
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fs-8 text-body-highlight ps-0 text-transform-none fw-normal" for="inputCardNumber">@lang('checkout.phone_number')</label>
                            <input class="form-control" wire:model.defer="phone" id="phone" type="number" placeholder="@lang('checkout.phone_number')" aria-label="Card number" oninput="this.value = this.value.slice(0, 10);" onkeypress="return event.key >= '0' && event.key <= '9';" >
                            
                            @error('phone')
                            <small class="text-danger">@lang('checkout.The phone number field is required')</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fs-8 text-body-highlight ps-0 text-transform-none fw-normal"
                                for="inputName">@lang('checkout.email')</label>
                            <input class="form-control" wire:model.defer='email' id="email" id="inputName" type="text"
                                placeholder="@lang('checkout.email')" aria-label="Full name">
                            @error('email')
                            <small class="text-danger">@lang('checkout.The email is required')</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fs-8 text-body-highlight ps-0 text-transform-none fw-normal"
                                for="inputName">@lang('checkout.address')</label>
                            <textarea class="form-control" wire:model.defer='address' id="address"
                                placeholder="@lang('checkout.address_p')" name="" id="inputName" cols="20"
                                rows="3"></textarea>
                            {{-- <input class="form-control" id="inputName" type="text" placeholder="Adress"
                                aria-label="Full name"> --}}
                            @error('address')
                            <small class="text-danger">@lang('checkout.The address field is required')</small>
                            @enderror
                        </div>

                    </div>
                    <div class="row g-2 mb-5 mb-lg-0">

                    </div>
                    <div class="row g-2 mb-5 mb-lg-0">
                        <label>@lang('checkout.Select Payment Mode') </label>
                        <div class="d-md-flex align-items-start" wire:ignore>
                            <div class="nav col-md-5 flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link fw-medium active" style="border-radius: 5px;"
                                    id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment"
                                    type="button" role="tab" aria-controls="onlinePayment"
                                    aria-selected="false">@lang('checkout.online payment')</button>
                                <button class="nav-link  fw-medium" style="border-radius: 5px;"
                                    id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab"
                                    type="button" role="tab" aria-controls="cashOnDeliveryTab"
                                    aria-selected="true">@lang('checkout.Cash upon goods arrival')</button>
                            </div>
                            <div class="tab-content col-md-7" id="v-pills-tabContent">
                                <div class="tab-pane fade " id="cashOnDeliveryTab" role="tabpanel"
                                    aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                    <h6 class=" fw-medium">@lang('checkout.Pay when the goods arrive Mode')</h6>
                                    <hr />
                                    {{-- <button type="button" class="btn btn-primary">Place Order (Cash on
                                        Delivery)</button> --}}
                                    <div class="col-md-12 col-lg-12 d-grid" style="margin-top: -5px;">
                                        <button type="button" class="btn btn-primary fw-medium" style="height: 42px"
                                            wire:click='codOrder'>@lang('checkout.place order')</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="onlinePayment" role="tabpanel"
                                    aria-labelledby="onlinePayment-tab" tabindex="0">
                                    <h6 class=" fw-medium">@lang('checkout.Online Payment Mode')(KHQR)</h6>
                                    <hr />
                                    {{-- <button type="button" class="btn btn-warning">Pay Now (Online Payment)</button>
                                    --}}
                                    <div class="col-12 col-lg-12" style="margin-top: -4px;">
                                        {{-- <h5 class="mb-2 text-body-highlight fw-medium">Click to pay</h5> --}}
                                        <div class="col-12 col-lg-12">
                                            {{-- <h5 class="mb-2 text-body-highlight fw-medium">Click to pay</h5> --}}
                                            <div class="col-md-12 col-lg-12 d-grid mt-1">
                                                <button type="button" id="myButton" onclick="handleClick()"class="btn btn-danger">
                                                    <img src="{{asset('phoenix-assets/images/KHQR_available_here_-_logo_with_bg-removebg-preview.png')}}" class="" width="15%" alt="">
                                                </button>
                                                <div class="text-center mt-2" wire:ignore>
                                                    <img style="border-radius: 2px;width:46px;"
                                                        src="{{ asset('phoenix-assets/images/aba.png') }}" alt="">
                                                    <img style="border-radius: 2px;width:70px;" class="border"
                                                        src="{{ asset('phoenix-assets/images/acleda.png') }}" alt="">
                                                    <img style="border-radius: 2px;width:72px;"
                                                        class="border bg-success p-1 rounded-1"
                                                        src="{{ asset('phoenix-assets/images/wing.png') }}" alt="">
                                                    <img style="border-radius: 2px;width:72px;" class="border rounded-1"
                                                        src="{{ asset('phoenix-assets/images/sathabna.png') }}" alt="">
                                                    <img style="border-radius: 2px;width:85px;" class="border rounded-1"
                                                        src="{{ asset('phoenix-assets/images/vattanac.jpg') }}" alt="">
                                                    <img style="border-radius: 2px;width:85px;"
                                                        class="border rounded-1 mt-2"
                                                        src="{{ asset('phoenix-assets/images/woori.png') }}" alt="">
                                                    <img style="border-radius: 2px;width:85px;"
                                                        class="border rounded-1 mt-2 p-1"
                                                        src="{{ asset('phoenix-assets/images/chipmong.png') }}" alt="">
                                                    <img style="border-radius: 2px;width:85px;"
                                                        class="border rounded-1 mt-2"
                                                        src="{{ asset('phoenix-assets/images/true.png') }}" alt="">
                                                    <img style="border-radius: 2px;width:85px;"
                                                        class="border rounded-1 mt-2 p-1"
                                                        src="{{ asset('phoenix-assets/images/philib.png') }}" alt="">

                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal fade" id="checkout" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">

                                                <div class="modal-content">
                                                    <div class="d-flex float-end gap-4" style="margin-left: 19.5cm;">
                                                        {{-- <a href="" class="btn btn-primary">sd</a> --}}
                                                        <div class="" style="position: absolute;margin-top: -30px;margin-right:8px;padding-right: 10px;">
                                                            @if(isset($carttotal) && $carttotal->total_amount)
                                                                <div class="border-dashed-y">
                                                                    <span class="mt-3" id="countdown">2:00</span>
                                                                    {{-- <p class="mb-2">Scan. Pay. Done.</p>
                                                                    <p wire:ignore class="mb-2">${{ number_format($carttotal->total_amount, 2) }}</p> --}}
                                                                </div>
                                                            @else
                                                                <div class="border-dashed-y">
                                                                    <span class="mt-3" id="countdown">2:00</span>
                                                                    {{-- <p class="mb-2">Scan. Pay. Done.</p>
                                                                    <p wire:ignore class="mb-2">${{ number_format($totalProductAmount, 2) }}</p> --}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="" style="margin-left: 30px;">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute;margin-top: -30px;"></button>

                                                        </div>

                                                    </div>

                                                    {{-- <div class=" bg-danger d-flex "
                                                        style="border-top-left-radius: 6px;border-top-right-radius: 6px;">
                                                        <center>
                                                            <h5 class="modal-title text-white"
                                                                id="exampleModalLabel">Modal title</h5>
                                                            <img src="{{asset('phoenix-assets/images/KHQR_available_here_-_logo_with_bg-removebg-preview.png')}}" class="p-3" width="20%" alt="">
                                                        </center>
                                                        <span class=" mt-3 text-white" style="margin-right: 20px;" id="countdown">2:00</span>

                                                        
                                                    </div> --}}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="modal-body text-center">
                                                                <div class="card-card">
                                                                    <!-- Header -->
                                                                    <div class="card-card-header">
                                                                        <center>
                                                                            <img src="{{asset('phoenix-assets/images/KHQR_available_here_-_logo_with_bg-removebg-preview.png')}}" class="" width="20%" alt="">
                                                                        </center>
                                                                       
                                                                    </div>
                                                            
                                                                    <!-- Content -->
                                                                    <div class="card-card-content">
                                                                        <div class="name">{{$bakong->merchantName}}</div>
                                                                        <div class="" style="display: flex;gap: 4px;margin-top: -7px;">
                                                                            <div class="amount">
                                                                                @if(isset($carttotal) && $carttotal->total_amount)
                                                                                    <div class="border-dashed-y">
                                                                                       
                                                                                        <p wire:ignore class="mb-2">${{ number_format($carttotal->total_amount, 2) }}</p>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="border-dashed-y">
                                                                                        
                                                                                        <p wire:ignore class="mb-2">${{ number_format($totalProductAmount, 2) }}</p>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="currency" style="margin-top: 14px;">USD</div>
                                                                        </div>
                                                                       
                                                                    </div>
                                                            
                                                                    <!-- Divider -->
                                                                    <!-- <div class="divider"></div> -->
                                                                    <div style=" border-top: 1.5px dashed #ccc;margin-top: -10px; height: 0;">
                                                                        
                                                                    </div>
                                                                    
                                                            
                                                                    <!-- QR Code -->
                                                                    <center>
                                                                        <div class="qr-code" style="margin-top: 10px;">
                                                                            <img src="{{asset('phoenix-assets/images/Dollar.png')}}" style="position: absolute;width:20%;height:20%;margin-top:85px;margin-left:4px;" width="10%" alt="">
                                                                            <img src="" id="image" alt="QR Code for payment">
                                                                        </div>
                                                                    </center>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" style="border-left: 1px dashed rgb(155, 148, 148);">
                                                            <h4 class="mt-5 me-5">@lang('checkout.How to make payment?')</h4>
                                                            <br>
                                                            <ol type="1" class=" me-5">
                                                                <li class="fw-normal">@lang('checkout.Open Bakong App')</li>
                                                                <li class="fw-normal">@lang('checkout.Tap "QR pay"')</li>
                                                                <li class="fw-normal">@lang('checkout.Scan')</li>
                                                                <li class="fw-normal">@lang('checkout.Confirm and Done')</li>
                                                            </ol>
                                                            <div class="position-relative mt-4" style="margin-right: 20px;">
                                                                <hr class="bg-body-secondary">
                                                                <div class="divider-content-center fw-normal">@lang('checkout.or')</div>
                                                            </div>
                                                         
                                                            <ol type="1" class=" me-5">
                                                                <li class="fw-normal">@lang('checkout.Open any Mobile Banking Apps the support KHQR')</li>
                                                                <li class="fw-normal">@lang('checkout.Scan QR Code')</li>
                                                                <li class="fw-normal">@lang('checkout.Confirm and Done')</li>
                                                            </ol>                      
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <img src="{{asset('phoenix-assets/images/KHQR_available_here_-_logo_with_bg-removebg-preview.png')}}" class=" bg-danger rounded-2" width="15%" alt="">
                                                            | <p class="fw-normal">Scan. Pay. Done</p>

                                                        </div>
                                                    </div>
                                                 
                                                    {{-- <div class="modal-footer bg-danger">

                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row g-0 border-top border-bottom">
                            <div class="col-sm-4">
                                <div class="nav flex-sm-column border-bottom border-bottom-sm-0 border-end-sm fs-9 vertical-tab h-100 justify-content-between"
                                    role="tablist" aria-orientation="vertical">
                                    <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center active"
                                        id="pricingTab" data-bs-toggle="tab" data-bs-target="#pricingTabContent"
                                        role="tab" aria-controls="pricingTabContent" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-tag me-sm-2 fs-4 nav-icons">
                                            <path
                                                d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                            </path>
                                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                                        </svg><span class="d-none d-sm-inline">Payment upon goods arrival</span>
                                    </a>
                                    <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center"
                                        id="restockTab" data-bs-toggle="tab" data-bs-target="#restockTabContent"
                                        role="tab" aria-controls="restockTabContent" aria-selected="false"
                                        tabindex="-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-package me-sm-2 fs-4 nav-icons">
                                            <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                            <path
                                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                            </path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                        <span class="d-none d-sm-inline">Online payment</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="tab-content py-3 ps-sm-4 h-100" wire:ignore>
                                    <div class="tab-pane fade show active" id="pricingTabContent" role="tabpanel"
                                        aria-labelledby="pricingTab">
                                        <h4 class="mb-3 d-sm-none">Pricing</h4>
                                        <div class="row g-3">
                                            <div class="col-12 col-lg-12">
                                                <h5 class="mb-2 text-body-highlight fw-medium">Click to pay</h5>
                                                <div class="col-md-12 col-lg-12 d-grid">
                                                    <button type="button" class="btn btn-primary"
                                                        wire:click='codOrder'>Place Order</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade h-100" id="restockTabContent" role="tabpanel"
                                        aria-labelledby="restockTab">

                                        <div class="d-flex flex-column h-100">

                                            <div class="row g-3">
                                                <div class="col-12 col-lg-12">
                                                    <h5 class="mb-2 text-body-highlight fw-medium">Click to pay</h5>
                                                    <div class="col-md-12 col-lg-12 d-grid">
                                                        <button type="button" id="myButton" onclick="handleClick()"
                                                            class="btn btn-primary">Pay Now(${{
                                                            $this->totalProductAmount }}.00)</button>
                                                    </div>

                                                </div>
                                                <div class="modal fade" id="checkout" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class=" bg-danger "
                                                                style="border-top-left-radius: 6px;border-top-right-radius: 6px;">
                                                                <center>
                                                                    <img src="{{asset('phoenix-assets/images/KHQR_available_here_-_logo_with_bg-removebg-preview.png')}}"
                                                                        class="p-3" width="20%" alt="">
                                                                </center>

                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <div class="border-dashed-y">
                                                                    <p class=" mb-2">Scan. Pay. Done.</p>
                                                                    <p class=" mb-2">${{ $this->totalProductAmount }}.00
                                                                    </p>

                                                                </div>
                                                                <center>
                                                                    <div class="qr-code text-center">

                                                                        <img src="" class=" pr-2 pt-2 pl-2 pb-2"
                                                                            id="image" alt="QR Code"
                                                                            style="margin-bottom: 40px;" />
                                                                        <div class="corner top-left"></div>
                                                                        <div class="corner top-right"></div>
                                                                        <div class="corner bottom-left"></div>
                                                                        <div class="corner bottom-right"></div>
                                                                    </div>
                                                                </center>


                                                            </div>
                                                            <div class="modal-footer bg-danger">
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="card mt-3 mt-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 fw-medium">@lang('checkout.summary')</h3><button class="btn btn-link pe-0"
                                type="button"></button>
                        </div>
                        <br>
                       <div class="border-dashed border-bottom border-translucent mb-2"></div>
                        @forelse ($carts as $cartItem)
                        @if ($cartItem->product)
                        <div class="border-dashed border-bottom border-translucent mt-2">
                            <div class="ms-n2">
                                <div class="row align-items-center mb-2 g-3">
                                    <div class="col-8 col-md-7 col-lg-8 gap">
                                        <div class="d-flex align-items-center mr-2">
                                            @if ( $cartItem->product->productImages)
                                                <img src="{{ $cartItem->product->productImages[0]->image }}" alt=""
                                                width="40" class=" rounded-3 me-2 ms-1 border">
                                            @else
                                            <img src="" alt="" width="53" class=" rounded-3">
                                            @endif
                                            {{-- <img class="me-2 ms-1" src="../../../assets/img/products/1.png"
                                                width="40" alt=""> --}}
                                            <h6 class="fw-semibold text-body-highlight lh-base truncate1">
                                                {{ $cartItem->product->name }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-3 col-lg-2">
                                        <h6 class="fs-10 mb-0">x{{ $cartItem->quantity}}</h6>
                                    </div>
                                    <div class="col-2 ps-0">
                                        {{-- ${{ number_format($totalAfterDiscount, 2) }} --}}
                                        <h5 class="mb-0 fw-semibold text-end">${{ number_format($cartItem->quantity *  $cartItem->product->discounted_price) }}</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endif

                        @empty
                        <tr class="text-center">
                            <td colspan="8" style="color: rgb(255, 0, 0);">@lang('checkout.no item add')!!!</td>
                        </tr>
                        @endforelse
                        <div class="border-dashed border-bottom border-translucent mt-4">
                            {{-- <div class="d-flex justify-content-between mb-2">
                                <h5 class="text-body fw-semibold">Items subtotal: </h5>
                                <h5 class="text-body fw-semibold">${{ $this->totalProductAmount }}.00</h5>
                            </div> --}}
                            @if ($carttotal && $carttotal->coupon)
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="text-body fw-normal">Coupon : </h5>
                                    <h5 class=" fw-normal">
                                    
                                        @if ($carttotal->coupon->discount_type == 'percent')
                                            {{ $carttotal->coupon->code }} (-{{ $carttotal->coupon->discount_value }}%)
                                        @else
                                            {{ $carttotal->coupon->code }} (-${{ $carttotal->coupon->discount_value }}.00)
                                        @endif
                                        

                                    </h5>
                                </div>
                            @else
                                <!-- Handle cases where there is no coupon -->
                            @endif
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="text-body fw-normal">@lang('checkout.discount') : </h5>
                                <h5 class="text-danger fw-normal">-${{ number_format($carttotal->total_discount ?? 0, 2) }}</h5>
                            </div>
                            {{-- <div class="d-flex justify-content-between mb-2">
                                <h5 class="text-body fw-normal">Tax: </h5>
                                <h5 class="text-body fw-normal">$0.00</h5>
                            </div> --}}
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="text-body fw-normal">@lang('checkout.subtotal') : </h5>
                                <h5 class="text-body fw-normal">
                                    @if(isset($carttotal) && $carttotal->total_amount)
                                        <div class="border-dashed-y">
                                            <p wire:ignore class="mb-2">${{ number_format($carttotal->total_amount, 2) }}</p>
                                        </div>
                                    @else
                                        <div class="border-dashed-y">
                                            <p wire:ignore class="mb-2">${{ number_format($totalProductAmount, 2) }}</p>
                                        </div>
                                    @endif
                                </h5>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                {{-- <h5 class="text-body fw-semibold">Shipping Cost </h5> --}}
                                {{-- <h5 class="text-body fw-semibold">$30 </h5> --}}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between border-dashed-y pt-3">
                            <h4 class="mb-0">@lang('checkout.total') :</h4>
                            <h4 class="mb-0">
                                @if(isset($carttotal) && $carttotal->total_amount)
                                    <div class="border-dashed-y">
                                        <p wire:ignore class="mb-2">${{ number_format($carttotal->total_amount, 2) }}</p>
                                    </div>
                                @else
                                    <div class="border-dashed-y">
                                        <p wire:ignore class="mb-2">${{ number_format($totalProductAmount, 2) }}</p>
                                    </div>
                                @endif

                                {{-- @if(isset($carttotal) && $carttotal->total_amount)
                                    <div class="border-dashed-y">
                                        <p wire:ignore class="mb-2">${{ number_format($carttotal->total_amount, 2) }}</p>
                                    </div>
                                @else
                                    <div class="border-dashed-y">
                                        <p wire:ignore class="mb-2">${{ number_format($totalProductAmount, 2) }}</p>
                                    </div>
                                @endif --}}

                            </h4>
                            {{-- Total Amount: ${{ number_format($carttotal->total_amount ?? 0, 2) }} --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="card card-body shadow text-center p-md-5">
            <h4 class=" mb-3">No items iin cart to checkout</h4>
            <a href="{{ url('/all-products') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
        @endif

    </div>
</div>
@push('scripts')
<script src="https://github.com/davidhuotkeo/bakong-khqr/releases/download/bakong-khqr-1.0.6/khqr-1.0.6.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   

        document.getElementById('myButton').addEventListener('click', function() {
    // Check if all fields have values
        if (!document.getElementById('fullname').value
            || !document.getElementById('phone').value
            || !document.getElementById('email').value
            || !document.getElementById('address').value) 
        {
            // Emit an event to Livewire to handle validation
            Livewire.emit('validationForAll');
            return false;
        } else {
            // Set the Livewire component properties using @this.set
            // @this.set('fullname', document.getElementById('fullname').value);
            // @this.set('phone', document.getElementById('phone').value);
            // @this.set('email', document.getElementById('email').value);
            // @this.set('address', document.getElementById('address').value);

            // Show the modal using Bootstrap's API
            var modal = new bootstrap.Modal(document.getElementById('checkout'));
            modal.show();

            // Start the countdown when the modal is shown
            startCountdown();

            // Clean up when the modal is hidden
            document.getElementById('checkout').addEventListener('hidden.bs.modal', function () {
                cancelAnimationFrame(countdownTimer);
                document.getElementById('countdown').textContent = '2:00'; // Reset to 2 minutes
            });
        }
    });

    var countdownTimer;
    var endTime;

    // Function to start the countdown
    function startCountdown() {
        var timeLeft = 120; // 2 minutes
        var countdownElement = document.getElementById('countdown');
        endTime = Date.now() + timeLeft * 1000; // Calculate the end time

        function updateCountdown() {
            var now = Date.now();
            var timeRemaining = endTime - now;

            if (timeRemaining >= 0) {
                var minutes = Math.floor(timeRemaining / 60000);
                var seconds = Math.floor((timeRemaining % 60000) / 1000);
                seconds = seconds < 10 ? '0' + seconds : seconds;
                countdownElement.textContent = minutes + ':' + seconds;
                countdownTimer = requestAnimationFrame(updateCountdown); // Schedule the next frame
            } else {
                var modal = bootstrap.Modal.getInstance(document.getElementById('checkout'));
                modal.hide(); // Hide the modal using Bootstrap's API
            }
        }

        updateCountdown(); // Start the countdown
    }
    var totalAmount = @if(isset($carttotal) && $carttotal->total_amount) 
                    {{ number_format($carttotal->total_amount, 2) }} 
                 @else 
                    {{ number_format($totalProductAmount, 2) }} 
                 @endif;
    var { BakongKHQR, khqrData, IndividualInfo } = BakongKHQR;

    // Generate the KHQR code
    const optionalData = {
        currency: khqrData.currency.usd,
        merchantType: "{{$bakong->merchantType}}",
        transactionCurrency: "{{$bakong->transactionCurrency}}",
        // amount:   totalAmount, // Transaction amount in cents
        amount:   totalAmount, // Transaction amount in cents
        countryCode: "{{$bakong->countryCode}}",
        crc: "{{$bakong->crc}}",
        // merchantType: "29",
        // transactionCurrency: "840",
        // amount:   totalAmount, // Transaction amount in cents
        // countryCode: "KH",
        // crc: "EDDE"
    };

    const individualInfo = new IndividualInfo(
        "{{$bakong->bakongAccountID}}",
        "{{$bakong->merchantName}}",
        "{{$bakong->merchantCity}}",
        // "sievphor_tonn@aclb", // Example account ID
        // "Sievphor Tonn", // Example name
        // "Phnom Penh", // Example location
        optionalData
    );

    const newkhqr = new BakongKHQR();
    const qrResponse = newkhqr.generateIndividual(individualInfo);
    console.log("Generated KHQR:", qrResponse);
    
    // Display the QR code in the img tag
    
    document.getElementById("image").src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + encodeURIComponent(qrResponse.data.qr);
    
    // let currentToken = "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7ImlkIjoiODRlMDA1ZDBiMDkxNDg0NSJ9LCJpYXQiOjE3MjM1NTg3NjIsImV4cCI6MTczMTMzNDc2Mn0.d-znG9MDDROIXhwZh7JMMd12SHMvhcFtEBwvwP6oj14";
    let currentToken = "Bearer {{$token->token}}";
    
                                
    async function renewToken(email) {
    const renewTokenUrl = "https://api-bakong.nbc.gov.kh/v1/renew_token";

    try {
        const response = await fetch(renewTokenUrl, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email }),
        });

        if (response.ok) {
            const data = await response.json();
            if (data.responseCode === 0) {
                const newToken = data.data.token;

                // Save the new token in Laravel
                await fetch('/api/update-token', {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ token: `Bearer ${newToken}` }),
                });

                console.log("Token renewed and saved successfully:", newToken);
            } else {
                console.error("Token renewal failed:", data.responseMessage);
            }
        } else {
            console.error("Failed to renew token:", response.status, response.statusText);
        }
    } catch (error) {
        console.error("Error during token renewal:", error);
    }
}


// Updated function name
async function getCurrentToken() {
    try {
        const response = await fetch('/api/get-token');
        if (response.ok) {
            const data = await response.json();
            console.log("Current Token:", data.token);
            return data.token;
        } else {
            console.error("Failed to retrieve token:", response.status, response.statusText);
        }
    } catch (error) {
        console.error("Error retrieving token:", error);
    }
}









    // Step 2: Check Transaction
    async function checkTransaction(md5) {
        const url = "https://api-bakong.nbc.gov.kh/v1/check_transaction_by_md5";
        const email = "tonnsievphor@gmail.com";
        let retries = 0;

        while (retries < 5) {
            try {
                console.log(`Attempt ${retries + 1} to check transaction.`);

                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": currentToken,
                    },
                    body: JSON.stringify({ md5 }),
                });

                if (response.ok) {
                    const data = await response.json();
                    if (data.responseCode === 0) {
                        Livewire.emit('transactionsEmit');
                        // alert("Payment was successful!");
                        break;
                    } else {
                        console.log("Transaction not completed:", data.responseMessage);
                    }
                } else if (response.status === 401) {
                    console.log("Token expired. Attempting renewal...");
                    await renewToken(email);
                } else {
                    console.error("Failed to check transaction. Status:", response.status, response.statusText);
                }
            } catch (error) {
                console.error("Error during transaction check:", error);
            }

            retries++;
            await new Promise(resolve => setTimeout(resolve, Math.pow(2, retries) * 1000)); // Exponential backoff
        }
    }

    // async function checkTransaction(md5) {
    //     const url = "https://api-bakong.nbc.gov.kh/v1/check_transaction_by_md5";
    //     const token = "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7ImlkIjoiZWRhMTBmZWY2Y2VmNDhhYyJ9LCJpYXQiOjE3MzE4Mzk4ODYsImV4cCI6MTczOTYxNTg4Nn0.VYoQ8cRSQc4ZFbm7ojALJgca2HzconJgsNZ0CsOtc1w";

    //     while (true) {
    //         try {
    //             const response = await fetch(url, {
    //                 method: 'POST',
    //                 headers: {
    //                     'Content-Type': 'application/json',
    //                     'Authorization': token
    //                 },
    //                 body: JSON.stringify({ md5 })
    //             });

    //             if (response.ok) {
    //                 const data = await response.json();
    //                 if (data.responseCode === 0) {
    //                     Livewire.emit('transactionsEmit');
    //                     // Display success message using SweetAlert2
    //                     // Swal.fire({
    //                     //     icon: 'success',
    //                     //     title: 'Success',
    //                     //     text: 'Payment was successful!',
    //                     // });
    //                     break;
    //                 } else {
    //                     console.log("Payment not yet completed. Retrying in 5 seconds...");
    //                 }
    //             } else {
    //                 console.error('Failed to check payment status. Status code:', response.status);
    //             }
    //         } catch (error) {
    //             console.error('Error checking payment status:', error);
    //         }

    //         // Wait for 5 seconds before retrying
    //         await new Promise(resolve => setTimeout(resolve, 5000));
    //     }
    // }

    // Start checking the transaction status with the generated MD5 hash
    checkTransaction(qrResponse.data.md5);
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> --}}

<!-- JavaScript for Modal and Countdown Timer -->
<script>

</script>
@endpush