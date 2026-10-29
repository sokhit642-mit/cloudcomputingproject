@extends('layouts.admin')
@section('title','Orders Detail')

@section('content')

<div class="">
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item fw-normal"><a href="#!">Home</a></li>
            <li class="breadcrumb-item fw-normal"><a href="#!">Orders</a></li>
            <li class="breadcrumb-item active fw-normal" aria-current="page">Order Detail</li>
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
    <div class="d-flex justify-content-between align-items-end mb-4">
        <h2 class="mb-0 fw-medium">Order Detail</h2>
        <div>
            <a href="{{ url('admin/orders') }}" class="btn btn-warning">All Order</a>
            {{-- <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-info">Download invoice</a> --}}
            <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-primary">Views invoice</a>
            

          
        </div>
    </div>
    
    <div class="card ">
        
        <div class="bg-white dark__bg-gray-1100 p-4 mb-4 rounded-2 ">
            <div class="row g-4 justify-content-between">


                <div class="col-12 col-sm-6 col-lg-10">
                    <div class="row g-4">
                        <div class="col-12 col-lg-6">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 ">Order ID :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-normal mb-0">{{$order->id}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">Tracking No :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-normal mb-0">{{$order->tracking_no}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">Order Date :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-normal mb-0">
                                            {{$order->created_at->format('d-m-Y h:i A')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">Payment :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-normal mb-0">{{$order->payment_mode}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">Order status :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 rounded-2 border text-success text-center fw-normal mb-0">
                                            {{$order->status_message}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-lg-6">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 ">Full Name :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-normal mb-0">{{$order->fullname}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">Email :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-normal mb-0">{{$order->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">Phone :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-normal mb-0">{{$order->phone}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto col-lg-6 col-xl-5">
                                        <h6 class="mb-0 me-3 fs-9">Address :</h6>
                                    </div>
                                    <div class="col-auto col-lg-6 col-xl-7">
                                        <p class="fs-9 text-body-secondary fw-normal mb-0">{{$order->address}}</p>
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
                    <thead class="table-secondary">
                        <tr>
                        <th style="width: 24px;"></th>
                            <th scope="col" class="text-center" style="width: 24px;">NO.</th>
                            <th style="width: 400px;">Products</th>
                            <th >Color</th>
                            <th >Size</th>
                            <th >Quantity</th>
                            <th >Price</th>
                            <th scope="col" style="width: 24px;">Total</th>
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
                                <td class="align-middle truncate1">
                                    
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
                                    <div class="color white-space-nowrap text-body-tertiary fs-9 fw-normal">
                                        @lang('cart.noColor')</div>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($orderItem->productSize)
                                    {{$orderItem->ProductSize->size->name}}
                                    @else
                                    <div class="size white-space-nowrap text-body-tertiary fs-9 fw-normal">
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
                                    ${{ $orderItem->quantity * $orderItem->product->discounted_price }}.00
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
                        
                        
                    </tbody>
                    {{-- <tr class="bg-body-secondary">
                        <td class=""></td>
                        <td class=" text-end" colspan="6" class=" fw-medium ml-2"> Sub Total :</td>
                        <td class="" colspan="1" class=" fw-medium">${{ $totalPrice }}.00</td>
                        <td class=""></td>
                    </tr>
                    @if ($orderItem->coupon_code)
                        <tr class="bg-body-secondary">
                            <td></td>
                            <td class="text-end" colspan="">Coupon:</td>
                            <td colspan="1">
                                <div class="d-flex align-items-center">
                                    {{ $orderItem->coupon_code }}
                                    @if ($orderItem->discount_type == 'percent')
                                        <div class="fs-9">(-{{ $orderItem->discount_value }}%)</div>
                                    @else
                                        <div class="fs-9">- ${{ $orderItem->discount_value }}</div>
                                    @endif
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    @else

                    @endif

                    <tr class="bg-body-secondary ">
                        <td class=""></td>
                        
                        
                        <td class=" text-end" style="margin-right: 70px;" colspan="6" class=" fw-medium ml-2"> Discount :</td>
                        <td class=" text-danger" colspan="1" >
                            @if ( $orderItem->total_discount == 0 )
                                -$0.00
                            @else
                                -${{ $orderItem->total_discount }}  
                            @endif
                        </td>
                        <td class=""></td>
                    </tr>
                    <tr class="bg-body-secondary">
                        <td class=""></td>
                        <td class=" text-end" colspan="6" class=" fw-medium ml-2"> Total Amount :</td>
                        <td class="" colspan="1">${{ $orderItem->price }}.00</td>
                        <td class=""></td>
                    </tr> --}}
                </table>
                <div class="table-responsive card-body">
                    <table class="table m-0 table-borderless">
                      <tbody>
                        <tr>
                          <td class="align-top pe-6 ps-0 py-6 text-body">
                           
                          </td>
                          <td class="px-0 py-6 w-px-100">
                            <p class="mb-2">Subtotal:</p>
                            @if ($orderItem->coupon_code == 'N/A')
                            @else
                                <p class="mb-2">Coupon:</p>

                                <!-- Handle cases where there is no coupon -->
                            @endif
                            <p class="mb-2 border-bottom pb-2">Discount:</p>
                            {{-- <p class="mb-2 border-bottom pb-2">Tax:</p> --}}
                            <p class="mb-0">Total:</p>
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
                                        (-${{ number_format($orderItem->discount_value, 2) }})
                                    @endif
                                    
                                    
                                </p>
                                <!-- Handle cases where there is no coupon -->
                            @endif
                            <p class="fw-medium border-bottom text-danger mb-2 pb-2">
                                @if ( $orderItem->total_discount == 0 )
                                    -$0.00
                                @else
                                    -${{ number_format($orderItem->total_discount, 2) }}  
                                @endif
                            </p>
                            <p class="fw-medium mb-0">${{ number_format($orderItem->price, 2) }}</p>
                            
                          </td>
                          <td  width="2px"></td>
                         
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <h4>Order Process (Order Status Updates)</h4>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <form id="orderStatusForm" action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="">Update Your Order Status</label>
                    <div class="input-group">
                        <select id="orderStatusSelect" name="order_status" class="form-select me-2">
                            <option value="">Select Status</option>
                            <option value="in-progress" {{ Request::get('order_status') == 'in-progress' ? 'selected':'' }}>in-progress</option>
                            <option value="completed" {{ Request::get('order_status') == 'completed' ? 'selected':'' }}>Completed</option>
                            <option value="pending" {{ Request::get('order_status') == 'pending' ? 'selected':'' }}>Pending</option>
                            <option value="out-for-delivery" {{ Request::get('order_status') == 'out-for-delivery' ? 'selected':'' }}>Out for Delivery</option>
                        </select>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <br>
                <h4 class="mt-3">Current Order Status: <span class="text-uppercase">{{ $order->status_message }}</span></h4>
            </div>
        </div>
        </div>
        
    </div>
       
   
</div>
@endsection
@push('scripts')
<script>
    document.getElementById('orderStatusForm').addEventListener('submit', function(event) {
        var statusSelect = document.getElementById('orderStatusSelect').value;
        if (statusSelect === '') {
            toastr.warning('Please select order status before submit.');
            event.preventDefault(); // Prevent form submission
        }
    });
  </script>
@endpush
