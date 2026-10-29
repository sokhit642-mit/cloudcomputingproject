<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="" data-template="vertical-menu-template">
 <head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">

    {{-- <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}"> --}}

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('admin-das/image-removebg-preview.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin-das/css/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-das/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-das/css/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin-das/css/core.css') }}"  />
    <link rel="stylesheet" href="{{ asset('admin-das/css/theme-default.css') }}"  />
    <link rel="stylesheet" href="{{ asset('admin-das/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-das/css/custom.css') }}" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin-das/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-das/css/typeahead.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('admin-das/css/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-das/css/custom.css') }}" />
    {{-- <link href="{{ asset('admin-das/css/dropzone.css')}}" rel="stylesheet" /> --}}
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Page CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css"> --}}


    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
     /* Ensure the title does not wrap and displays all text */
      .swal2-container .swal-toast-popup .swal-toast-title {
        font-size: 20px; /* Custom font size for the title */
        font-weight: normal; /* Custom font weight for the title */
        /* white-space: nowrap; Prevent the text from wrapping */
        /* overflow: visible; Ensure all text is visible */
      }

    </style>
      
    <!-- Helpers -->
    <script src="{{ asset('admin-das/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    {{-- <script src="{{ asset('admin-das/js/template-customizer.js')}}"></script> --}}
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin-das/js/config.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <style>
      .truncate1 {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 270px; /* Adjust as needed */
      }
      .truncate2 {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 270px; /* Adjust as needed */
      }
      .multi-line-truncate {
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Number of lines to show */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 200px; /* Adjust as needed */
        height: 3em; Adjust according to line height
        line-height: 1.5em; /* Adjust according to your text line height */
      }
    </style>
    <style>
      /* Custom style to position the alert at the front */
      .swal-overlay {
          z-index: 10000; /* Ensure the alert is on top */
      }
      .swal-modal {
          position: fixed;
          top: 10px; /* Adjust this value to move it more to the top */
          left: 50%;
          transform: translateX(-50%);
      }

      .swal-overlay {
            z-index: 2000 !important; /* Ensure the overlay is on top */
        }
        .swal-modal {
            z-index: 2001 !important; /* Ensure the modal is on top */
        }
  </style>

  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <style>
      .editor-container {
          max-width: 800px;
          margin: 50px auto;
          padding: 20px;
          border: 1px solid #ccc;
          border-radius: 10px;
          background-color: #fff;
      }
      .editor-toolbar {
          border-bottom: 1px solid #ccc;
          margin-bottom: 10px;
      }
      .editor {
          height: 300px;
      }
  </style>
  <style>
    /* @charset "UTF-8"; */
    html * {
      box-sizing: border-box;
    }

    p {
      margin: 0;
    }

    .upload__box {
      padding: 10px;
    }
    .upload__inputfile {
      width: 0.1px;
      height: 0.1px;
      opacity: 0;
      overflow: hidden;
      position: absolute;
      z-index: -1;
    }
    .upload__btn {
      display: inline-block;
      font-weight: 600;
      color: #fff;
      text-align: center;
      min-width: 116px;
      padding: 5px;
      transition: all 0.3s ease;
      cursor: pointer;
      border: 2px solid;
      background-color: #4045ba;
      border-color: #4045ba;
      border-radius: 10px;
      line-height: 26px;
      font-size: 14px;
    }
    .upload__btn:hover {
      background-color: unset;
      color: #4045ba;
      transition: all 0.3s ease;
    }
    .upload__btn-box {
      margin-bottom: 10px;

    }
    .upload__img-wrap {
      /* padding: 5px; */
      display: flex;
      flex-wrap: wrap;
      /* margin: 0 -10px; */
      border-radius: 20px;
      /* box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; */

    }
    .upload__img-box {
      /* position: ; */
      width: 230px;
      /* padding: 0 0px; */
      /* margin-bottom: 12px; */
      border-radius: 8px;
      padding: 5px;
      box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
      
    }
    .upload__img-close {
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background-color: rgba(0, 0, 0, 0.5);
      position: absolute;
      top: 10px;
      right: 10px;
      text-align: center;
      line-height: 24px;
      z-index: 1;
      cursor: pointer;
    }
    .upload__img-close:after {
      content: "✖";
      font-size: 14px;
      color: white;
    }

    .img-bg {
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      position: relative;
      padding-bottom: 100%;
    }
  </style>
  <style>
    .toast {
        width: 400px !important; /* Adjust the width as needed */
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
  @livewireStyles
</head>

<body>
    <div class="card">
           
        <div class="card-body invoice-preview-header rounded">
            <div
                class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column align-items-xl-center align-items-md-start align-items-sm-center align-items-start">
                <div class="mb-xl-0 mb-6 text-heading">
                    <div class="d-flex svg-illustration mb-6 gap-2 align-items-center">
                        <span class="app-brand-logo demo">

                            <img src="{{ asset('front-assets/homesport-logo.png') }}" width="50%" alt="Success" class="img-fluid mt-1 border p-5 rounded-2">
                           

                        </span>
                        {{-- <span class="app-brand-text demo fw-bold ms-50 lh-1">sneat</span> --}}
                    </div>
                    {{-- <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
                    <p class="mb-2">San Diego County, CA 91905, USA</p>
                    <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p> --}}
                </div>
                <div>
                    <h5 class="mb-6">Report #{{ $formattedToday }}</h5>

                    <div class="mb-1 text-heading">
                        <span>Date Issued:</span>
                        <span class="fw-medium">{{ $dateIssued->format('F d, Y') }}</span>
                    </div>
                    <div class="text-heading">
                        <span>Date Due:</span>
                        <span class="fw-medium">{{ $dateDue->format('F d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
        @php
            $totalPrice = 0; // Initialize total price
        @endphp
        <h3 class="text-center mb-0"><u>HomeSport Report</u></h3>
        <div class="border-y border-translucent card-body">
            <div class="table-responsive border border-bottom-0 border-top-0 rounded">
                <table class="table fs-9 text-body mb-0 border-top border-bottom">
                    <thead class="table">
                        <tr>
                            {{-- <th></th> --}}
                            <th scope="col" class="text-center">NO.</th>
                            <th scope="col" class="text-center" style="width:170px;">Date</th>
                            <th style="width: 400px;">Products</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th scope="col" style="width: 24px;">Total</th>
                            {{-- <th scope="col" style="width: 24px;"></th> --}}
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php
                        $totalPrice = 0;
                        @endphp

                        @forelse ($orderItems as $orderItem)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            {{-- <td></td> --}}
                            <td class="text-center align-middle">{{ $loop->index + 1 }}</td>
                            <td class="text-center align-middle">{{$orderItem->created_at->format('d-m-Y')}}</td>

                            <td class="align-middle truncate1">

                                @if ($orderItem->product)
                                <div class="d-flex align-items-center">
                                    @if ($orderItem->product->productImages &&
                                    count($orderItem->product->productImages) > 0)
                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}" alt=""
                                        width="53" class="rounded-3">
                                    @else
                                    <img src="" alt="No image" width="53" class="rounded-3">
                                    @endif
                                    <div class="ms-3 truncate1">
                                        {{ $orderItem->product->name }}
                                    </div>
                                </div>


                                @else
                                No product
                                @endif
                            </td>

                            <td class="align-middle">
                                @if ($orderItem->productColor)
                                <input type="color" value="{{ $orderItem->productColor->color->code }}" disabled>
                                @else
                                <div class="color white-space-nowrap text-body-tertiary fs-10 fw-normal"
                                    style="font-size:14px; ">
                                    @lang('cart.noColor')
                                </div>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if ($orderItem->productSize)
                                {{ $orderItem->productSize->size->name }}
                                @else
                                <div class="size white-space-nowrap text-body-tertiary fs-9 fw-normal">
                                    @lang('cart.noSize')
                                </div>
                                @endif
                            </td>
                            <td class="align-middle">
                                {{ $orderItem->quantity }}
                            </td>
                            <td>
                                {{ $orderItem->product->selling_price }}

                            </td>

                            <td class="align-middle">
                                ${{ number_format($orderItem->quantity * $orderItem->product->selling_price, 2) }}
                            </td>

                            @php
                            $totalPrice += $orderItem->quantity * $orderItem->product->selling_price;
                            @endphp
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="8" style="color: rgb(255, 0, 0);">No items added!</td>
                        </tr>
                        @endforelse

                        {{-- <tr class="bg-body-secondary">
                            <td class="table-secondary" colspan="7">Total:</td>
                            <td class="table-secondary" colspan="1" class="fw-medium">${{ number_format($totalPrice,
                                2) }}</td>
                        </tr> --}}
                    </tbody>
                </table>



            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table m-0 table-borderless">
                        <tbody>
                            <tr>
                                <td class="align-top pe-6 ps-0 py-6 text-body">
                                    <p class="mb-1">
                                        <span class="me-2 h6">Manage report:</span>
                                        <span>{{ Auth::user()->name }}</span>
                                    </p>
                                    <span>Thanks for your business</span>
                                </td>
                                <td class="px-0 py-6 w-px-100">
                                    <p class="mb-2 border-bottom">Subtotal:</p>
                                    {{-- <p class="mb-2">Discount:</p> --}}
                                    {{-- <p class="mb-2 border-bottom pb-2">Tax:</p> --}}
                                    <p class="mb-0">Total:</p>
                                </td>
                                <td class="text-end px-0 py-6 w-px-100 fw-medium text-heading">
                                    <p class="fw-medium mb-2 border-bottom">${{ number_format($totalPrice, 2) }}</p>
                                    {{-- <p class="fw-medium mb-2">$28</p> --}}
                                    {{-- <p class="fw-medium mb-2 border-bottom pb-2">21%</p> --}}
                                    <p class="fw-medium mb-0">${{ number_format($totalPrice, 2) }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="mt-0 mb-6">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12">
                        <span class="fw-medium text-heading">Note:</span>
                        <span>It was a pleasure working with you and your team. We hope you will keep us in mind for
                            future freelance projects. Thank You!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script src="{{ asset('admin-das/js/jquery.js')}}"></script>
  <script src="{{ asset('admin-das/js/popper.js')}}"></script>
  <script src="{{ asset('admin-das/js/bootstrap.js')}}"></script>
  <script src="{{ asset('admin-das/js/perfect-scrollbar.js')}}"></script>
  <script src="{{ asset('admin-das/js/hammer.js')}}"></script>
  <!--<script src="{{ asset('admin-das/js/i18n.js')}}"></script>-->
  <script src="{{ asset('admin-das/js/typeahead.js')}}"></script>
  <script src="{{ asset('admin-das/js/menu.js')}}"></script>
  
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{ asset('admin-das/js/apexcharts.js')}}"></script>
  {{-- <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
  <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
  <script src="../../assets/vendor/libs/moment/moment.js"></script>
  <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
  <script src="../../assets/vendor/libs/select2/select2.js"></script> --}}
  <!-- Main JS -->
  <script src="{{ asset('admin-das/js/main.js')}}"></script>
  <script src="{{ asset('admin-das/js/custom.js')}}"></script>
  <script src="{{ asset('admin-das/js/form-layouts.js')}}"></script>
  {{-- toastr --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script> --}}
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('toast', (type, message) => {
            toastr[type](message);
        });
    });
  </script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      Livewire.on('message', function(message, type) {
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

          toastr[type](message);
      });
  });
</script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{-- <script src="{{ asset('admin-das/js/dropzone-min.js')}}"></script> --}}

  <!-- Page JS -->
  <script src="{{ asset('admin-das/js/dashboards-crm.js')}}"></script>
  <script>
    function previewBeforeUpload(id){
      document.querySelector("#"+id).addEventListener("change",function(e){
        if(e.target.files.length == 0){
          return;
        }
        let file = e.target.files[0];
        let url = URL.createObjectURL(file);
        
        document.querySelector("#"+id+"-preview img").src = url;
      });
    }

    previewBeforeUpload("image");
  </script>
  <script>
    $(document).ready(function () {
        $('#categorySelect').change(function () {
            var categoryId = $(this).val();
            filterBrandsByCategory(categoryId);
        });
    });

    function filterBrandsByCategory(categoryId) {
        $('#brandSelect option').each(function () {
            var brandCategoryId = $(this).data('category-id');
            if (!categoryId || categoryId == brandCategoryId) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        $('#brandSelect').val('');
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const categorySelect = document.getElementById('categorySelect');
      const brandsItems = document.querySelectorAll('.brands-item');

      categorySelect.addEventListener('change', function () {
          const selectedCategory = categorySelect.value;
          filterBrands(selectedCategory);
      });

      function filterSizes(categoryId) {
        brandsItems.forEach(brand => {
              if (categoryId === "" || brand.getAttribute('data-brand') === categoryId) {
                  brand.style.display = 'flex';
              } else {
                  brand.style.display = 'none';
              }
          });
      }
  });

</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const categorySelect = document.getElementById('categorySelect');
      const sizeItems = document.querySelectorAll('.size-item');

      categorySelect.addEventListener('change', function () {
          const selectedCategory = categorySelect.value;
          filterSizes(selectedCategory);
      });

      function filterSizes(categoryId) {
          sizeItems.forEach(sizeItem => {
              if (categoryId === "" || sizeItem.getAttribute('data-category') === categoryId) {
                  sizeItem.style.display = 'flex';
              } else {
                  sizeItem.style.display = 'none';
              }
          });
      }
  });

</script>
<script>
  $(document).ready(function () {
            $('#categorySelect').change(function () {
                var categoryId = $(this).val();
                if (categoryId) {
                    $('#brandSelect').prop('hidden', false);
                    $('#SizeCheck').prop('disabled', false);
                } else {
                    $('#brandSelect').prop('visible', true);
                    $('#SizeCheck').prop('disabled', true);
                }
            });

            
        });
</script>
{{-- <script type="text/javascript">
  Dropzone.options.dropzone =
  {
      maxFilesize: 12,
      renameFile: function(file) {
          var dt = new Date();
          var time = dt.getTime();
          return time+file.name;
      },
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      addRemoveLinks: true,
      timeout: 5000,
      success: function(file, response) {
          console.log(response);
      },
      error: function(file, response){
          return false;
      }
    };
  </script> --}}
  <script>
    jQuery(document).ready(function () {
      ImgUpload();
    });

    function ImgUpload() {
      var imgWrap = "";
      var imgArray = [];

      $('.upload__inputfile').each(function () {
        $(this).on('change', function (e) {
          imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
          var maxLength = $(this).attr('data-max_length');

          var files = e.target.files;
          var filesArr = Array.prototype.slice.call(files);
          var iterator = 0;
          filesArr.forEach(function (f, index) {

            if (!f.type.match('image.*')) {
              return;
            }

            if (imgArray.length > maxLength) {
              return false
            } else {
              var len = 0;
              for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i] !== undefined) {
                  len++;
                }
              }
              if (len > maxLength) {
                return false;
              } else {
                imgArray.push(f);

                var reader = new FileReader();
                reader.onload = function (e) {
                  var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                  imgWrap.append(html);
                  iterator++;
                }
                reader.readAsDataURL(f);
              }
            }
          });
        });
      });

      $('body').on('click', ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
          if (imgArray[i].name === file) {
            imgArray.splice(i, 1);
            break;
          }
        }
        $(this).parent().parent().remove();
      });
    }
  </script>
  
  @yield('script')
  @livewireScripts
  
  @stack('scripts')
</body>

</html>

<!-- beautify ignore:end -->