@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="pb-5">
  <div class="row g-6">

    <div class="col-lg-3 col-sm-6">
      <div class="card card-border-shadow-primary h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="avatar me-4">
              <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-cart-download '></i></span>
            </div>
            <h4 class="mb-0">{{$totalOrder}}</h4>
          </div>
          <p class="mb-2">Total Orders</p>
          <p class="mb-0">
            {{-- <span class="text-heading fw-medium me-2">+18.2%</span> --}}
            <span class="text-muted"><a href="{{url('admin/orders')}}">Views</a></span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="card card-border-shadow-primary h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="avatar me-4">
              <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-cart-download '></i></span>
            </div>
            <h4 class="mb-0">{{$todayOrder}}</h4>
          </div>
          <p class="mb-2">Today Orders</p>
          <p class="mb-0">
            {{-- <span class="text-heading fw-medium me-2">+18.2%</span> --}}
            <span class="text-muted"><a href="{{url('admin/orders')}}">Views</a></span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="card card-border-shadow-primary h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="avatar me-4">
              <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-cart-download '></i></span>
            </div>
            <h4 class="mb-0">{{$thisMonthOrder }}</h4>
          </div>
          <p class="mb-2">This Mounth Orders</p>
          <p class="mb-0">
            {{-- <span class="text-heading fw-medium me-2">+18.2%</span> --}}
            <span class="text-muted"><a href="{{url('admin/orders')}}">Views</a></span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="card card-border-shadow-primary h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="avatar me-4">
              <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-cart-download '></i></span>
            </div>
            <h4 class="mb-0">{{$thisYearOrder }}</h4>
          </div>
          <p class="mb-2">This Year Orders</p>
          <p class="mb-0">
            {{-- <span class="text-heading fw-medium me-2">+18.2%</span> --}}
            <span class="text-muted"><a href="{{url('admin/orders')}}">Views</a></span>
          </p>
        </div>
      </div>
    </div>

    <hr class="mt-4">

    <div class="col-lg-3 col-sm-6">
      <div class="card card-border-shadow-warning h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="avatar me-4">
              <span class="avatar-initial rounded bg-label-warning"><i class='bx bxs-user-rectangle'></i></span>
            </div>
            <h4 class="mb-0">{{$totalUser}}</h4>
          </div>
          <p class="mb-2">All Users</p>
          <p class="mb-0">
            {{-- <span class="text-heading fw-medium me-2">-8.7%</span> --}}
            <span class="text-muted"><a href="{{url('admin/user')}}">Views</a></span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="card card-border-shadow-danger h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="avatar me-4">
              <span class="avatar-initial rounded bg-label-danger"><i class='bx bxs-user-account'></i></span>
            </div>
            <h4 class="mb-0">{{$totalAdmin}}</h4>
          </div>
          <p class="mb-2">All Admins</p>
          <p class="mb-0">
            {{-- <span class="text-heading fw-medium me-2">+4.3%</span> --}}
            <span class="text-muted"><a href="{{url('admin/admins')}}">Views</a></span>

          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-sm-6">
      <div class="card card-border-shadow-info h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="avatar me-4">
              <span class="avatar-initial rounded bg-label-info"><i class='bx bxs-spreadsheet'></i></span>
            </div>
            <h4 class="mb-0">{{$totalProducts}}</h4>
          </div>
          <p class="mb-2">Total Products</p>
          <p class="mb-0">
            {{-- <span class="text-heading fw-medium me-2">-2.5%</span> --}}
            <span class="text-muted"><a href="{{url('admin/products')}}">Views</a></span>

          </p>
        </div>
      </div>

    </div>
    <div class="col-lg-2 col-sm-6">
      <div class="card card-border-shadow-primary h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="avatar me-4">
              <span class="avatar-initial rounded bg-label-info"><i class='bx bx-category'></i></span>
            </div>
            <h4 class="mb-0">{{$totalCategories}}</h4>
          </div>
          <p class="mb-2">Total Categories</p>
          <p class="mb-0">
            {{-- <span class="text-heading fw-medium me-2">-2.5%</span> --}}
            <span class="text-muted"><a href="{{url('admin/category')}}">Views</a></span>
          </p>
        </div>
      </div>

    </div>
    <div class="col-lg-2 col-sm-6">
      <div class="card card-border-shadow-secondary h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="avatar me-4">
              <span class="avatar-initial rounded bg-label-info"><i class='bx bx-layer'></i></span>
            </div>
            <h4 class="mb-0">{{$totalBrands}}</h4>
          </div>
          <p class="mb-2">Total Brands</p>
          <p class="mb-0">
            {{-- <span class="text-heading fw-medium me-2">-2.5%</span> --}}
            <span class="text-muted"><a href="{{url('admin/brands')}}">Views</a></span>
          </p>
        </div>
      </div>

    </div>
    <div class="row mt-3" style="margin-left: 2px;">

      <!-- Total Income -->

        <div class="card">
          <div class="row row-bordered">
            <div class="col-md-8 p-4">
              <h4>Yearly Income Overview</h4>
              <p>View and analyze the monthly income trends for the year.</p>
              <div id="chart"></div>


            </div>
            <div class="col-md-4">
              <div class="card-header">
                <div class="table-responsive text-nowrap">
                  {{-- <h5 class="card-title mb-1">Report</h5> --}}
                  {{-- <table class="dt-multilingual table border-top dataTable no-footer dtr-column collapsed border-bottom" style="width: 100%">
                    <thead class="table-secondary">
                      <tr>
                        <th  >Month</th>
                        <th >Total Income</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($monthlyIncome as $month => $data)
                        <tr>
                          <td>{{ \Carbon\Carbon::createFromFormat('m', $month)->format('F') }}</td>  <!-- Format month to name -->
                          <td>{{ number_format($data->total, 2) }} $  <!-- Format total to 2 decimal places --></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table> --}}
                  {{-- <hr>
                  <div id="salesChart" class="chart"></div> --}}
                  {{-- <hr> --}}
                  {{-- <!-- Sales Percentage Section -->
                  <div class="mb-4">
                    <h3>Sales Percentage</h3>
                    <p>{{ $salesPercentage }}%</p>
                  </div>

                  <!-- Percentage Change from Last Month Section -->
                  <div class="mb-4">
                      <h3>Percentage Change from Last Month</h3>
                      <p>-{{ $percentageChange }}%</p>
                  </div> --}}

                  <!-- Sales Percentage Radial Bar Chart (ApexCharts) -->
                  {{-- <div id="salesChart"></div> --}}

                  <!-- Percentage Change Radial Bar Chart (ApexCharts) -->
                  {{-- <div id="salesChart"></div> --}}
                  {{-- <div id="percentageChangeChart"></div> --}}

                  <!-- Monthly Income Chart (ApexCharts) -->
                  {{-- <div id="chart"></div> --}}

                  <!-- Sales Target Doughnut Chart (Chart.js) -->
                  {{-- <canvas id="salesPercentageChart" width="400" height="400"></canvas> --}}
                  <div class="card-card">
                    <!-- Header -->
                    <div class="card-card-header">
                        <center>
                            <img src="{{asset('phoenix-assets/images/KHQR_available_here_-_logo_with_bg-removebg-preview.png')}}" class="" width="20%" alt="">
                        </center>
                       
                    </div>
            
                    <!-- Content -->
                    <div class="card-card-content">
                        <div class="name" style="font-family: 'Nunito Sans', sans-serif;">
                          {{$bakong->merchantName}}
                        </div>
                        <div class="" style="display: flex;gap: 4px;margin-top: -7px;font-family: 'Nunito Sans', sans-serif;">
                            <div class="amount">
                                {{-- @if(isset($carttotal) && $carttotal->total_amount)
                                    <div class="border-dashed-y">
                                       
                                        <p wire:ignore class="mb-2">$</p>
                                    </div>
                                @else
                                    <div class="border-dashed-y">
                                        
                                        <p wire:ignore class="mb-2">$</p>
                                    </div>
                                @endif --}}0
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
                            <img src="{{asset('phoenix-assets/images/Dollar.png')}}" style="position: absolute;width:40px;height:40px;margin-top:90px;"alt="">
                            <img src="" id="qrgen" alt="QR Code for payment">
                        </div>
                    </center>
                    
                </div>
                </div>

              </div>

            </div>
          </div>
        </div>
        <!--/ Total Income -->


    </div>
    <div class="col-xxl-4 col-lg-5 mt-3">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <div class="card-title mb-0">
            <h5 class="m-0 me-2">Coupons</h5>
          </div>
          <a href="{{url('admin/coupons')}}" class="btn btn-label-primary">Views</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table">
              <thead class="table-secondary">
                <tr>
                  <th class="">Code</th>
                  <th>Value</th>
                  <th>Expire</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($coupons as $coupon)
                  <tr>
                    <td class="">
                      <div class="d-flex justify-content-start align-items-center">

                        <h6 class="mb-0 fw-normal">{{$coupon->code}}</h6>
                      </div>
                    </td>
                    <td class="">
                      <span>
                        @if ($coupon->discount_type === 'fixed')
                          -{{$coupon->discount_value}}$
                        @else
                          -{{$coupon->discount_value}}%
                        @endif

                      </span>
                    </td>
                    <td class=" text-nowrap">
                      <h6 class="mb-0">{{$coupon->expiry_date}}</h6>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xxl-8 mt-3">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <div class="card-title mb-0">
            <h5 class="m-0 me-2">Products</h5>
          </div>
          <a href="{{url('admin/products')}}" class="btn btn-label-primary">Views</a>

        </div>
        <div class="card-body">

          <div class="table-responsive text-nowrap">
            <table class="dt-multilingual table dataTable no-footer dtr-column collapsed">
              <thead class="table-secondary" >
                <tr style="border-radius:8px;">
                  {{-- <th style="font-size: 12px;">#</th> --}}
                  <th style="font-size: 12px;">@lang('admin_dash.product')</th>
                  {{-- <th style="font-size: 12px;">@lang('admin_dash.category')</th> --}}
                  {{-- <th style="font-size: 12px;">@lang('admin_dash.brand')</th> --}}
                  {{-- <th >Sub-Category</th> --}}
                  <th style="font-size: 12px;">@lang('admin_dash.product_price')</th>
                  <th style="font-size: 12px;">Discount value</th>
                  <th style="font-size: 12px;">Discount</th>
                  {{-- <th style="font-size: 12px;">Qty</th> --}}
                  {{-- <th style="font-size: 12px;">@lang('admin_dash.status')</th> --}}
                  {{-- <th style="font-size: 12px;">@lang('admin_dash.action')</th> --}}
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($products as $product)
                  <tr>

                    {{-- <td style="vertical-align: middle;" scope="row">{{ $product->id }}</td> --}}
                    <td style="vertical-align: middle;" class=" d-flex align-items-center" >
                      <div class="d-flex justify-content-start align-items-center product-name">
                        <div class="avatar-wrapper">
                          <div class="avatar avatar me-4 rounded-2 bg-label-secondary img-thumbnail">
                            <img src="{{ asset($product->productImages[0]->image) }}" alt="Product-9" class="rounded">
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
                    {{-- <td  style="vertical-align: middle;">
                      <img src="{{ Storage::url($product->brand->image) }}" width="30%" alt="">
                    </td> --}}
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
                    {{-- <td style="vertical-align: middle;">{{ $product->quantity }}</td> --}}
                    {{-- <td style="vertical-align: middle;">
                      <span class="badge rounded-pill bg-label-{{ $product->status ? 'danger' :  'success'}} bg-label-{{ $product->status ? '<i class="bi bi-exclamation-octagon me-1"></i>' :  '<i class="bi bi-check-circle "></i>'}}">{{ $product->status == '1' ? ' Hidden':' Visible' }}</i></span>
                    </td> --}}
                    {{-- <td style="vertical-align: middle;width:2cm;">
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

                    </td> --}}
                  </tr>
                @empty
                <tr class="text-center">
                  <td colspan="8" style="color: rgb(255, 0, 0);">@lang('admin_dash.no products available!!')</td>
                </tr>
                @endforelse
              </tbody>

            </div>
            </table>
            <div class="mt-2 float-end">
              {{$products->links()}}
            </div>
            {{-- <div>
              <ul class="pagination pagination-sm float-end" style="margin-right: 20px;">{{ $products->links() }}</ul>
            </div> --}}
          </div>
        </div>
      </div>
      
    
    </div>
   
    <div class="col-12 mt-4">
      <div class="row  mb-12 g-3">
      
        @foreach ($topSellingProducts as $item)
          @php $product = $item->product; @endphp
          <div class="col-md-4">
              <div class="card ">
                  <div class="card-body">
                    <img class="border p-4 w-100 rounded-2" style="width: 300px;" 
                      src="{{ asset($product->productImages[0]->image) }}" 
                      alt="{{ $product->name }}">
                    
              
                      <img style="margin-top: -80px; margin-left: 10px;" 
                          src="{{ Storage::url($product->brand->image) }}" 
                          class="img-fluid p-1" 
                          width="15%" 
                          alt="{{ $product->name }}">
      
                    
                      <h5 class="card-title mt-1">#{{ $product->name }}</h5>
                      <center>
                        <p class="card-text text-muted">Total Sold: {{ $item->total_sold }}</p>
  
                      </center>
                  </div>
              </div>
          </div>
        @endforeach
      </div>
    </div>
    
    {{-- <div class="top-selling-products">
      @foreach($topSellingProducts as $item)
          @php $product = $item->product; @endphp
          <div class="product-card">
              <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
              <h3>{{ $product->name }}</h3>
              <img src="{{ Storage::url($product->brand->image) }}" width="10%" alt="">
              <p>Brand: {{ $product->brand->name }}</p>
              <p>Total Sold: {{ $item->total_sold }}</p>
          </div>
      @endforeach
    </div> --}}
  
    {{-- <div class="row mb-12 g-4">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <img class=" border text-center p-4 w-100 rounded-2" style="width: 300px;" src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
            <img style="margin-top: -80px;margin-left:10px;" src="{{ Storage::url($product->brand->image) }}" class="img-fluid border rounded-2 p-1 w-20" width="10%" alt="{{ $product->brand->name }}">
            <h5 class="card-title">{{ $product->name }}</h5>
          </div>
          
        </div>
      </div>
      

    </div> --}}
    {{-- <table>
      <thead>
          <tr>
              <th>Product Name</th>
              <th>Total Sold</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($topSellingProducts as $product)
              <tr>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->total_sold }}</td>
              </tr>
          @endforeach
      </tbody>
    </table> --}}



    {{-- <button wire:click="$emit('orderCreated', ['id' => 123])">Test Event</button> --}}

    @if (Session('message'))
    <script>
      // const Toast = Swal.mixin({
      // toast: true,
      // position: "top-end",
      // showConfirmButton: false,
      // timer: 3500,

      // timerProgressBar: true,
      // didOpen: (toast) => {
      //     toast.onmouseenter = Swal.stopTimer;
      //     toast.onmouseleave = Swal.resumeTimer;
      // }
      // });
      // Toast.fire({
      // icon: "success",
      // title: "{{ Session('message')}}"
      // });
      // Swal.fire({
      //   position: "center",
      //   icon: "success",
      //   title: "{{ Session('message')}}",
      //   showConfirmButton: false,
      //   timer: 1500
      // });
      Swal.fire({
        title: "Admin dashboard",
        text: "{{ Session('message')}}",
        imageUrl: "{{ asset('admin-das/1f64f.png') }}",
        imageWidth: 300,
        imageHeight: 200,
        imageAlt: "Custom image"

      });
    </script>

  @endif
  </div>
</div>

@endsection
@push('scripts')
<script>
    var {
        objData,
        BakongKHQR,
        khqrData,
        IndividualInfo,
        MerchantInfo,
        SourceInfo,
    } = BakongKHQR;
    const optionalData = {
        currency: khqrData.currency.khr,
        merchantType: "{{$bakong->merchantType}}",
        transactionCurrency: "{{$bakong->transactionCurrency}}",
        countryCode: "{{$bakong->countryCode}}",
        crc: "{{$bakong->crc}}",
    };
    const individualInfo = new IndividualInfo(
        "{{$bakong->bakongAccountID}}",
        "{{$bakong->merchantName}}",
        "{{$bakong->merchantCity}}",
        optionalData
    );
    var boolen = true;

    setTimeout(function () {
        boolen = false;
        console.log('Value changed to:', boolen);

        if (!boolen) {
            // Refresh the QR code generation when boolen becomes false
            // generateQRCode();
        }
    }, 20000);

    function generateQR() {
        function generateQRCode() {
            const newKhqr = new BakongKHQR();
            response = newKhqr.generateIndividual(individualInfo);
            qrcode = response.data.qr;
            console.log(response.data.md5);
            console.log(qrcode);
            console.log(response.status.data);

            document.getElementById("qrgen").src =
                "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" +
                qrcode;
        }

        if (boolen) {
            generateQRCode();

            async function checkTransaction(md5) {
                const url = "https://api-bakong.nbc.gov.kh/v1/check_transaction_by_md5";
                const token =
                    "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7ImlkIjoiZmNkNWI3N2NiN2JjNGMzYyJ9LCJpYXQiOjE3MjI5NTgyNzMsImV4cCI6MTczMDczNDI3M30.gVQOpfxXN6XOl-pSNOyIsmWNnFKXgadOjSzRdWzhzsY";

                while (boolen) { // Continue only if boolen is true
                    try {
                        const response = await fetch(url, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "Authorization": token,
                            },
                            body: JSON.stringify({
                                md5
                            }),
                        });

                        const data = await response.json();

                        if (data.responseCode === 0) {
                            Livewire.dispatch('Success');
                            console.log(data);
                            console.log(data.data.fromAccountId);
                            break; // Exit the loop if responseCode is 0
                        } else {
                            console.log("Not successful, retrying...");
                        }
                    } catch (error) {
                        console.error("Error:", error);
                    }

                    await new Promise((resolve) => setTimeout(resolve, 5000)); // Wait 5 seconds before retrying
                }

                console.log("Stopping the request loop as boolen is now false.");
            }

            // Example usage
            checkTransaction(response.data.md5);
        }
    }
    generateQR()
</script>
@endpush
@section('script')
    <!-- Include the ApexCharts JS library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.40.0/apexcharts.min.js"></script>

    <!-- Include the Chart.js JS library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the data from Blade
            const salesPercentage = {{ $salesPercentage }};
            const percentageChange = {{ $percentageChange }};
            const monthlyIncomeData = @json($monthlyIncome);

            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const months = [];
            const income = [];
            let previousMonthIncome = 0;
            let currentMonthIncome = 0;

            for (let i = 0; i < 12; i++) {
                const dataForMonth = monthlyIncomeData[i + 1] || {}; // Safely access the data for each month
                months.push(monthNames[i]);
                income.push(dataForMonth.total || 0);

                if (i === 11) {  // December
                    previousMonthIncome = dataForMonth.total || 0;
                } else if (i === 12) {  // Current month
                    currentMonthIncome = dataForMonth.total || 0;
                }
            }

            // Calculate the percentage change
            let percentageChangeCalculated = 0;
            if (previousMonthIncome === 0 && currentMonthIncome > 0) {
                percentageChangeCalculated = 100;
            } else if (previousMonthIncome > 0) {
                percentageChangeCalculated = ((currentMonthIncome - previousMonthIncome) / previousMonthIncome) * 100;
            }

            // Format the percentage to include negative sign if sales decreased
            const formattedPercentage = percentageChangeCalculated < 0 ? `-${Math.abs(percentageChangeCalculated)}%` : `${Math.abs(percentageChangeCalculated)}%`;


            // If sales have decreased, adjust the sales percentage and percentage change
            let salesPercentageDisplay = salesPercentage;
            if (currentMonthIncome < previousMonthIncome) {
                salesPercentageDisplay = -Math.abs(salesPercentage);  // Negative sales percentage
                percentageChangeCalculated = -Math.abs(percentageChangeCalculated);  // Negative percentage change
            }

            // ApexCharts - Sales Percentage Radial Bar
            const salesChartOptions = {
                chart: { type: 'radialBar', height: 350 },
                series: [Math.abs(salesPercentageDisplay)],
                labels: ['Sales'],
                colors: [salesPercentageDisplay >= 0 ? '#1E90FF' : '#FF6347'],
                plotOptions: {
                    radialBar: {
                        hollow: { size: '70%' },
                        dataLabels: {
                            show: true,
                            name: { show: true },
                            value: {
                                fontSize: '22px',
                                color: '#4a4a4a',
                                formatter: function(value) {
                                    return `${value}%`;
                                }
                            }
                        }
                    }
                },
                annotations: {
                    position: 'front',
                    yaxis: [{
                        y: 50,
                        borderColor: '#FF6347',
                        label: {
                            borderColor: '#FF6347',
                            style: {
                                fontSize: '16px',
                                color: '#4a4a4a',
                                background: '#fff'
                            },
                            text: `Change: ${percentageChangeCalculated}%`
                        }
                    }]
                },
                tooltip: { enabled: true, y: { formatter: (val) => `${val}% of Target` } },
            };

            // Render ApexCharts for Sales Percentage
            const salesChart = new ApexCharts(document.querySelector("#salesChart"), salesChartOptions);
            salesChart.render();

            // ApexCharts - Percentage Change Radial Bar Chart
            const percentageChangeChartOptions = {
                chart: { type: 'radialBar', height: 280 },
                series: [Math.abs(percentageChange)],
                labels: ['Percentage Change'],
                colors: [percentageChange >= 0 ? '#4caf50' : '#FF6347'],
                plotOptions: {
                    radialBar: {
                        hollow: { size: '70%' },
                        dataLabels: {
                            show: true,
                            name: { show: true },
                            value: {
                                fontSize: '22px',
                                color: '#4a4a4a',
                                formatter: function(value) {
                                    return `${value}%`;
                                }
                            }
                        }
                    }
                },
                annotations: {
                    position: 'front',
                    yaxis: [{
                        y: 50,
                        borderColor: '#FF6347',
                        label: {
                            borderColor: '#FF6347',
                            style: {
                                fontSize: '16px',
                                color: '#4a4a4a',
                                background: '#fff'
                            },
                            text: `Change: ${formattedPercentage}`  // Display correctly formatted percentage
                        }
                    }]
                },
                tooltip: { enabled: true, y: { formatter: (val) => `${val}% change` } },
            };

            // Render ApexCharts for Percentage Change
            const percentageChangeChart = new ApexCharts(document.querySelector("#percentageChangeChart"), percentageChangeChartOptions);
            percentageChangeChart.render();

            // ApexCharts - Monthly Income Chart
            const monthlyIncomeOptions = {
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: { show: true },
                },
                series: [{ name: 'Monthly Income', data: income }],
                xaxis: { categories: months },
                yaxis: { labels: { formatter: (value) => `$${value / 1000}k` }, min: 0, max: 10000 },
                fill: { type: 'gradient', gradient: { shade: 'light', gradientToColors: ['#c4c8ff'], opacityFrom: 0.5 } },
                stroke: { curve: 'smooth', width: 3, colors: ['#4f46e5'] },
                tooltip: { theme: "light", y: { formatter: (value) => `$${value}` } },
                grid: { borderColor: '#e7e7e7', strokeDashArray: 4 },
            };
            const monthlyIncomeChart = new ApexCharts(document.querySelector("#chart"), monthlyIncomeOptions);
            monthlyIncomeChart.render();

            // Chart.js - Sales Target Doughnut Chart
            const remainingPercentage = 100 - salesPercentageDisplay;
            const ctx = document.getElementById('salesPercentageChart').getContext('2d');

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Sales Target', 'Remaining'],
                    datasets: [{
                        label: 'Sales Percentage',
                        data: [salesPercentageDisplay, remainingPercentage],
                        backgroundColor: ['#4caf50', '#e0e0e0'],
                        borderColor: ['#4caf50', '#e0e0e0'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.raw + '%';
                                }
                            }
                        },
                        beforeDraw: function(chart) {
                            const ctx = chart.chart.ctx;
                            ctx.save();
                            const fontSize = 20;
                            ctx.font = fontSize + 'px Arial';
                            ctx.fillStyle = '#4a4a4a';
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'middle';
                            ctx.fillText(salesPercentageDisplay.toFixed(2) + '%', chart.chart.width / 2, chart.chart.height / 2);
                            ctx.fillText('-' + percentageChangeCalculated.toFixed(2) + '%', chart.chart.width / 2, chart.chart.height / 2 + fontSize);
                            ctx.restore();
                        }
                    }
                }
            });
        });
    </script>
@endsection


