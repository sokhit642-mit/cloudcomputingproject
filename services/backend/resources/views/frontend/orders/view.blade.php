@extends('layouts.app')
@section('title','Orders Detail')

@section('content')

{{--
<livewire:fronted.wishlist-show /> --}}
<div class="container">
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item fw-normal"><a href="#!">@lang('home.home_menu')</a></li>
          <li class="breadcrumb-item fw-normal"><a href="#!">@lang('order.order')</a></li>
            <li class="breadcrumb-item active fw-normal" aria-current="page">@lang('order.Order Detail')</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-end mb-4">
        <h2 class="mb-0 fw-medium">@lang('order.Order Detail')</h2>
        <div>
            <a href="{{ ('/orders') }}" class="btn fw-medium btn-warning">@lang('order-d.all_orders')</a>
            <a href="{{ url('invoice/'.$order->id) }}" target="_blank" class="btn fw-medium btn-primary">@lang('order-d.v-invoice')</a>
            {{-- <button class="btn btn-phoenix-secondary" onclick="downloadInvoice()">
            Download
            </button> --}}
           
        </div>
    </div>
    <div id = "download-area">
        <div class="bg-white dark__bg-gray-1100 p-4 mb-4 rounded-2">
            <div class="row g-4 justify-content-between">


                <div class="col-12 col-sm-6 col-lg-10">
                    <div class="row g-4">
                        <div class="col-12 col-lg-6">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 ">@lang('order.orderid') :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-semibold mb-0">{{$order->id}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">@lang('order.tracking_no') :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-semibold mb-0">{{$order->tracking_no}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">@lang('order.order_date') :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-semibold mb-0">
                                            {{$order->created_at->format('d-m-Y h:i A')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">@lang('order.payment_mode') :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-semibold mb-0">{{$order->payment_mode}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">@lang('order.status_message') :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 rounded-2 border text-success text-center fw-semibold mb-0">
                                            {{$order->status_message}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-lg-6">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 ">@lang('checkout.full_name') :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-semibold mb-0">{{$order->fullname}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">@lang('checkout.email') :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-semibold mb-0">{{$order->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">@lang('checkout.phone_number') :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-semibold mb-0">{{$order->phone}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">@lang('checkout.address') :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-semibold mb-0">{{$order->address}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
        
                    

                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2">
                    <img src="{{ asset('front-assets/homesport-logo.png') }}" alt="Success" class="img-fluid mt-1 border p-5 rounded-2">
                </div>
                
            </div>
        </div>
        <div class="px-0">
            <div class="table-responsive scrollbar">
                <table class="table fs-9 text-body mb-0">
                    <thead class="bg-body-secondary">
                        <tr>
                        <th style="width: 24px;"></th>
                            <th scope="col" class="text-center" style="width: 24px;">#</th>
                            <th style="width: 400px;">@lang('admin_dash.product')</th>
                            <th >@lang('admin_dash.size')</th>
                            <th >@lang('admin_dash.color')</th>
                            <th >@lang('order-d.qty')</th>
                            <th >@lang('order-d.price')</th>
                            <th scope="col" style="width: 24px;">@lang('order-d.total')</th>
                        <th scope="col" style="width: 24px;"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php
                            $totalPrice = 0;
                        @endphp
                        @forelse ($order->orderItems as $orderItem)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td></td>
                            <td class="text-center align-middle">{{$loop->index + 1}}</td>
                            <td class="align-middle truncate">
                                
                                @if ( $orderItem->product->productImages)
                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}" alt="" width="53" class=" rounded-3">  
                                @else
                                    <img src="" alt="" width="53" class=" rounded-3">  
                                @endif
                                {{ $orderItem->product->name }}
                            
                            </td>
                        
                            <td class="align-middle">
                                @if ($orderItem->productColor)
                                {{-- {{ $orderItem->ProductColor->id}} --}}
                                <input type="color" value="{{$orderItem->ProductColor->color->code}}" disabled>
                                @else
                                <div class="color white-space-nowrap text-body-tertiary fs-9 fw-semibold">
                                    @lang('cart.noColor')</div>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if ($orderItem->productSize)
                                {{$orderItem->ProductSize->size->name}}
                                @else
                                <div class="size white-space-nowrap text-body-tertiary fs-9 fw-semibold">
                                    @lang('cart.noSize')</div>
                                @endif
                            </td>
                            <td class="align-middle">
                                {{ $orderItem->quantity}}
                            </td>
                            <td class="align-middle">
                                ${{ $orderItem->product->discounted_price}}.00
                            </td>
                            <td class="align-middle">
                                ${{ $orderItem->product->discounted_price *  $orderItem->quantity}}.00
                            </td>
                            <td></td>
                            @php
                                $totalPrice += $orderItem->quantity * $orderItem->product->discounted_price; 
                            @endphp
                        </tr>
                    
                    
                        @empty
                        <tr class="text-center">
                            
                            <td colspan="7" style="color: rgb(255, 0, 0);">No item Added!!!</td>
                        </tr>
                        @endforelse
                        {{-- <tr class="bg-body-secondary">
                            <td></td>
                            <td colspan="6" class=" fw-medium ml-2"> Total Amount :</td>
                            <td colspan="1" class=" fw-medium">${{ $totalPrice }}.00</td>
                            <td></td>
                        </tr> --}}
                       
                        <tr>
                          <td colspan="9">
                            <div class="table-responsive card-body" style="margin-top: -35px">
                              <table class="table table-borderless m-0">
                                <tbody>
                                  <tr>
                                    <td class="align-top pe-6 ps-0 py-6 text-body">
                                     
                                    </td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td class="align-top pe-6 ps-0 py-6 text-body"></td>
                                    <td></td>
                                    {{-- <td class="align-top pe-6 ps-0 py-6 text-body"></td> --}}
                                    {{-- <td class="align-top pe-6 ps-0 py-6 text-body"></td> --}}
                                    {{-- <td class="align-top pe-6 ps-0 py-6 text-body"></td> --}}
                                    <td class="px-0  py-6 w-px-100">
                                      <p class="mb-2 fw-bold">@lang('order-d.subtotal'):</p>
                                      @if ($orderItem->coupon_code == 'N/A')

                                      @else
                                        <p class="mb-2 fw-bold">@lang('order-d.coupon'):</p>

                                          <!-- Handle cases where there is no coupon -->
                                      @endif
                                      <p class="mb-2 border-bottom pb-2 fw-bold">@lang('order-d.discount'):</p>
                                      {{-- <p class="mb-2 border-bottom pb-2">Tax:</p> --}}
                                      <p class="mb-0 fw-bold">@lang('order-d.total'):</p>
                                    </td>
                                    <td class="text-end px-0 py-6 w-px-100 fw-medium text-heading">
                                      <p class="fw-medium mb-2">${{ $totalPrice }}.00</p>
                                      @if ($orderItem->coupon_code == 'N/A')
                                          
                                      @else
                                        <p class="fw-medium mb-2">
                                                
                                          {{ $orderItem->coupon_code }}
                                          @if ($orderItem->discount_type == 'percent')
                                              (-{{ $orderItem->discount_value }}%)
                                          @else
                                              (-${{ $orderItem->discount_value }})
                                          @endif
                                          
                                          
                                        </p>
                                          <!-- Handle cases where there is no coupon -->
                                      @endif
                                      <p class="fw-medium border-bottom mb-2 text-danger pb-2">
                                          @if ( $orderItem->total_discount == 0 )
                                              -$0.00
                                          @else
                                              -${{  number_format($orderItem->total_discount, 2)}}  
                                          @endif
                                      </p>
                                      <p class="fw-medium mb-0">${{ $orderItem->price }}.00</p>
                                      
                                    </td>
                                    <td  width="4px"></td>
                                    <td></td>
                                   
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </td>
                          
                        </tr>
                    </tbody>
                </table>
                
            </div>
        
        </div>
        
    </div>
    <br>
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div class=" d-flex gap-2">
            <h2 class="mb-0 fw-medium">@lang('order-d.tracking') :</h2>
        </div>
        {{-- <div class="">
            <a href="" target="_blank" class="btn btn-outline-primary">@lang('order.All Order')</a>
        </div> --}}
    </div>
   
    </div>
    <div class="container mt-5">
        <!-- Dropdown to Select Order Status -->
        <div class="mb-4" style="display: none;">
            <label for="orderStatusSelect" class="form-label">Select Order Status</label>
            
            <select id="orderStatusSelect" name="order_status" class="form-select">
                <option value="in-progress" {{ $order->status_message == 'in-progress' ? 'selected' : '' }}>Order Processing</option>
                <option value="completed" {{ $order->status_message == 'completed' ? 'selected' : '' }}>Order Complete</option>
                <option value="pending" {{ $order->status_message == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="out-for-delivery" {{ $order->status_message == 'out-for-delivery' ? 'selected' : '' }}>Shipped</option>
                
            </select>
        </div>
        @if ($order->status_message == 'in-progress')
        <div class="col-12 col-lg-6">
            <div class="timeline-vertical">
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-success" data-bs-theme="light"><svg class="svg-inline--fa fa-check text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fa-solid fa-check text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end border-dashed border-warning"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Order is processing')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package is ready for the seller to prepare.')</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                   
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-warning" data-bs-theme="light"><svg class="svg-inline--fa fa-check text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fa-solid fa-check text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end "></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Order Complete')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package has been picked up from the seller.')</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-body-quaternary" data-bs-theme="light"><svg class="svg-inline--fa fa-truck-ramp-box text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck-ramp-box" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M640 0V400c0 61.9-50.1 112-112 112c-61 0-110.5-48.7-112-109.3L48.4 502.9c-17.1 4.6-34.6-5.4-39.3-22.5s5.4-34.6 22.5-39.3L352 353.8V64c0-35.3 28.7-64 64-64H640zM576 400a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM23.1 207.7c-4.6-17.1 5.6-34.6 22.6-39.2l46.4-12.4 20.7 77.3c2.3 8.5 11.1 13.6 19.6 11.3l30.9-8.3c8.5-2.3 13.6-11.1 11.3-19.6l-20.7-77.3 46.4-12.4c17.1-4.6 34.6 5.6 39.2 22.6l41.4 154.5c4.6 17.1-5.6 34.6-22.6 39.2L103.7 384.9c-17.1 4.6-34.6-5.6-39.2-22.6L23.1 207.7z"></path></svg><!-- <span class="fa-solid fa-truck-ramp-box text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Pending')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package is now ready to be shipped.')</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center">
                  <div class="col-12 col-md-auto d-flex">
                   
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-body-quaternary" data-bs-theme="light"><svg class="svg-inline--fa fa-truck-fast text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"></path></svg><!-- <span class="fa-solid fa-truck-fast text-white fs-10"></span> Font Awesome fontawesome.com --></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Delivered')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Pending')</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        @elseif($order->status_message == 'completed')
        <div class="col-12 col-lg-6">
            <div class="timeline-vertical">
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-success" data-bs-theme="light"><svg class="svg-inline--fa fa-check text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fa-solid fa-check text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end border-success"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Order is processing')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package is ready for the seller to prepare.')</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-success" data-bs-theme="light"><svg class="svg-inline--fa fa-check text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fa-solid fa-check text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end border-dashed border-warning"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Order Complete')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package has been picked up from the seller.')</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-warning" data-bs-theme="light"><svg class="svg-inline--fa fa-truck-ramp-box text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck-ramp-box" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M640 0V400c0 61.9-50.1 112-112 112c-61 0-110.5-48.7-112-109.3L48.4 502.9c-17.1 4.6-34.6-5.4-39.3-22.5s5.4-34.6 22.5-39.3L352 353.8V64c0-35.3 28.7-64 64-64H640zM576 400a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM23.1 207.7c-4.6-17.1 5.6-34.6 22.6-39.2l46.4-12.4 20.7 77.3c2.3 8.5 11.1 13.6 19.6 11.3l30.9-8.3c8.5-2.3 13.6-11.1 11.3-19.6l-20.7-77.3 46.4-12.4c17.1-4.6 34.6 5.6 39.2 22.6l41.4 154.5c4.6 17.1-5.6 34.6-22.6 39.2L103.7 384.9c-17.1 4.6-34.6-5.6-39.2-22.6L23.1 207.7z"></path></svg><!-- <span class="fa-solid fa-truck-ramp-box text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end "></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Pending')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package is now ready to be shipped.')</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-body-quaternary" data-bs-theme="light"><svg class="svg-inline--fa fa-truck-fast text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"></path></svg><!-- <span class="fa-solid fa-truck-fast text-white fs-10"></span> Font Awesome fontawesome.com --></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Delivered')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Pending')</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        @elseif($order->status_message == 'pending')
        <div class="col-12 col-lg-6">
            <div class="timeline-vertical">
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-success" data-bs-theme="light"><svg class="svg-inline--fa fa-check text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fa-solid fa-check text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end border-success"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Order is processing')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package is ready for the seller to prepare.')</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-success" data-bs-theme="light"><svg class="svg-inline--fa fa-check text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fa-solid fa-check text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end border-success"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Order Complete')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package has been picked up from the seller.')</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-success" data-bs-theme="light"><svg class="svg-inline--fa fa-truck-ramp-box text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck-ramp-box" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M640 0V400c0 61.9-50.1 112-112 112c-61 0-110.5-48.7-112-109.3L48.4 502.9c-17.1 4.6-34.6-5.4-39.3-22.5s5.4-34.6 22.5-39.3L352 353.8V64c0-35.3 28.7-64 64-64H640zM576 400a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM23.1 207.7c-4.6-17.1 5.6-34.6 22.6-39.2l46.4-12.4 20.7 77.3c2.3 8.5 11.1 13.6 19.6 11.3l30.9-8.3c8.5-2.3 13.6-11.1 11.3-19.6l-20.7-77.3 46.4-12.4c17.1-4.6 34.6 5.6 39.2 22.6l41.4 154.5c4.6 17.1-5.6 34.6-22.6 39.2L103.7 384.9c-17.1 4.6-34.6-5.6-39.2-22.6L23.1 207.7z"></path></svg><!-- <span class="fa-solid fa-truck-ramp-box text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end border-dashed border-warning"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Pending')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package is now ready to be shipped.')</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-warning" data-bs-theme="light"><svg class="svg-inline--fa fa-truck-fast text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"></path></svg><!-- <span class="fa-solid fa-truck-fast text-white fs-10"></span> Font Awesome fontawesome.com --></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Delivered')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Pending')</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        @else

        <div class="col-12 col-lg-6">
            <div class="timeline-vertical">
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-success" data-bs-theme="light"><svg class="svg-inline--fa fa-check text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fa-solid fa-check text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end border-success"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Order is processing')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package is ready for the seller to prepare.')</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-success" data-bs-theme="light"><svg class="svg-inline--fa fa-check text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg><!-- <span class="fa-solid fa-check text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end border-success"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Order Complete')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package has been picked up from the seller.')</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-success" data-bs-theme="light"><svg class="svg-inline--fa fa-truck-ramp-box text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck-ramp-box" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M640 0V400c0 61.9-50.1 112-112 112c-61 0-110.5-48.7-112-109.3L48.4 502.9c-17.1 4.6-34.6-5.4-39.3-22.5s5.4-34.6 22.5-39.3L352 353.8V64c0-35.3 28.7-64 64-64H640zM576 400a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM23.1 207.7c-4.6-17.1 5.6-34.6 22.6-39.2l46.4-12.4 20.7 77.3c2.3 8.5 11.1 13.6 19.6 11.3l30.9-8.3c8.5-2.3 13.6-11.1 11.3-19.6l-20.7-77.3 46.4-12.4c17.1-4.6 34.6 5.6 39.2 22.6l41.4 154.5c4.6 17.1-5.6 34.6-22.6 39.2L103.7 384.9c-17.1 4.6-34.6-5.6-39.2-22.6L23.1 207.7z"></path></svg><!-- <span class="fa-solid fa-truck-ramp-box text-white fs-10"></span> Font Awesome fontawesome.com --></div><span class="timeline-bar border-end border-success"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Pending')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Your package is now ready to be shipped.')</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="row g-md-3 align-items-center">
                  <div class="col-12 col-md-auto d-flex">
                    
                    <div class="timeline-item-bar position-relative me-3 me-md-0">
                      <div class="icon-item icon-item-sm bg-success" data-bs-theme="light"><svg class="svg-inline--fa fa-truck-fast text-white fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"></path></svg><!-- <span class="fa-solid fa-truck-fast text-white fs-10"></span> Font Awesome fontawesome.com --></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="timeline-item-content ps-6 ps-md-3">
                      <h4>@lang('order-d.Delivered')</h4>
                      <p class="fs-9 text-body-secondary mb-0">@lang('order-d.Pending')</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        @endif
        
        <!-- Order Tracking Timeline -->
        {{-- <div class="timeline">
            <div class="timeline-step" id="step-in-progress">
                <div class="timeline-icon">
                    <i class="fas fa-spinner status-icon"></i>
                </div>
                <div class="timeline-content ms-5">
                    <h5>@lang('order-d.Order is processing')</h5>
                    <p>Your package is ready for the seller to prepare.</p>
                </div>
                <div class="timeline-line"></div>
            </div>
    
            <div class="timeline-step" id="step-completed">
                <div class="timeline-icon">
                    <i class="fas fa-check status-icon"></i>
                </div>
                <div class="timeline-content ms-5">
                    <h5>@lang('order-d.Order Complete')</h5>
                    <p>Your package has been picked up from the seller.</p>
                </div>
                <div class="timeline-line"></div>
            </div>
    
            <div class="timeline-step" id="step-pending">
                <div class="timeline-icon">
                    <i class="fas fa-hourglass-half status-icon"></i>
                </div>
                <div class="timeline-content ms-5">
                    <h5>Pending</h5>
                    <p>Your package is now ready to be out-for-delivery.</p>
                </div>
                <div class="timeline-line"></div>
            </div>
    
            <div class="timeline-step" id="step-out-for-delivery">
                <div class="timeline-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="timeline-content ms-5">
                    <h5>Out for Delivery</h5>
                    <p>Your package is now out-for-delivery.</p>
                    
                </div>
            </div>
    
            
        </div> --}}
    </div>
    
</div>

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
 function printInvoice() {
                window.print();
            }
function downloadInvoice(paperSize) {
    const { jsPDF } = window.jspdf;
    const buttons = document.querySelectorAll('.invoice-btns');

    // Hide buttons during PDF generation
    buttons.forEach(button => button.style.display = 'none');

    const pdf = new jsPDF('p', 'mm', paperSize === 'a5' ? [148, 210] : 'a4');

    pdf.html(document.querySelector("#download-area"), {
        x: 10, // Margin from left
        y: 10, // Margin from top
        callback: function (pdf) {
            pdf.save(`invoice_{{{$order->id}}}.pdf`);

            // Show buttons again after PDF generation
            buttons.forEach(button => button.style.display = 'flex');
        },
        margin: [10, 10, 10, 10], // top, left, bottom, right margins in mm
        autoPaging: 'text', // Automatically handles page breaks
        html2canvas: {
            scale: 0.8, // Adjust scale if needed
            useCORS: true,
        }
    });
}

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>

<script>
    const orderStatusSelect = document.getElementById('orderStatusSelect');
    const steps = {
        "in-progress": document.getElementById('step-in-progress'),
        "completed": document.getElementById('step-completed'),
        "pending": document.getElementById('step-pending'),
        "out-for-delivery": document.getElementById('step-out-for-delivery'),
        
    };

    function updateTimeline(status) {
        // Clear all active classes
        Object.values(steps).forEach(step => step.classList.remove('active'));

        // Activate steps based on status
        switch (status) {
            case "in-progress":
                steps['in-progress'].classList.add('active');
                break;
            case "completed":
                steps['in-progress'].classList.add('active');
                steps['completed'].classList.add('active');
                break;
            case "pending":
                steps['in-progress'].classList.add('active');
                steps['completed'].classList.add('active');
                steps['pending'].classList.add('active');
                break;
            case "out-for-delivery":
                steps['in-progress'].classList.add('active');
                steps['completed'].classList.add('active');
                steps['pending'].classList.add('active');
                steps['out-for-delivery'].classList.add('active');
                break;
           
        }
    }

    // Listen for changes on the dropdown and update the timeline
    orderStatusSelect.addEventListener('change', function () {
        updateTimeline(orderStatusSelect.value);
    });

    // Initialize with the default status
    updateTimeline(orderStatusSelect.value);
</script>
@endpush