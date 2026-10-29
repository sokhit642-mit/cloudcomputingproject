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
              <form wire:submit.prevent='destroyCoupon'>
                <div class="modal-body">
                  <h3>@lang('admin_dash.are_you_sure')</h3>
                  @lang('admin_dash.you want to delete this brand !')
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
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
              <li class="breadcrumb-item">Coupons</li>
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
                  <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                    <input type="text" wire:model='search' class="form-control" placeholder="Search Coupon...">
  
                    {{-- <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31"> --}}
                  </div>
                </div>
                <div class=" d-flex gap-2">
                  <div class="title">
                    {{-- <select wire:model='status'  class="select2 form-select select2-hidden-accessible" >
                      <option value=""  hidden data-select2-id="2">Select</option>
                      
                      <option value="United Kingdom">visible</option>
                      <option value="United States">hilden</option>
                    </select> --}}
                    
                  </div>
                  <a class="btn btn-label-primary" href="{{ url('admin/coupons/create') }}">
                    <i class="bi bi-plus-square me-2"></i> Add New Coupon
                  </a>
    
                </div>
            </div>
            <div class="">
                <table class="dt-multilingual table border-top dataTable no-footer dtr-column collapsed border-bottom">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Coupon Code</th>
                            <th>Discount Type</th>
                            <th>Discount Value</th>
                            <th>Usage Limit</th>
                            <th>Usage Count</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ ucfirst($coupon->discount_type) }}</td>
                            <td>{{ $coupon->discount_value }}</td>
                            <td>{{ $coupon->usage_limit }}</td>
                            <td>{{ $coupon->usage_count }}</td>
                            <td>{{ $coupon->expiry_date }}</td>
                            <td>
                                {{-- {{ ucfirst($coupon->status) }} --}}
                                @if (\Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($coupon->expiry_date)))
                                    <span class="badge bg-label-danger" text-capitalized="">Expired</span>
                                @else
                                    <span class="badge bg-label-success" text-capitalized="">Active</span>

                                    
                                @endif

                            </td>
                            <td>
                                <div class="row gy-3">
                                    <div class="col-lg-4 d-flex gap-1">
          
                                      {{-- <a type="button" href="{{ url('admin/category/'.$category->id.'/view') }}" class="btn btn-icon btn-label-primary" data-bs-original-title="View category" data-bs-toggle="tooltip">
                                        <i class="bi bi-eye-fill"></i>
                                      </a> --}}
                                      <a href="{{ url('admin/coupons/'.$coupon->id.'/edit') }}" type="button" class="btn btn-icon btn-label-secondary">
                                        <i class='bx bx-edit' ></i>
                                      </a>
                                      <button type="button"  wire:click="deleteCoupon({{$coupon->id}})"  class="btn btn-icon btn-label-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                        <i class='bx bxs-trash' ></i>
                                      </button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div> 
                    <ul class="pagination pagination-sm float-end" style="margin-right: 20px;">{{ $coupons->links() }}</ul>
                </div>
            </div>
        </div>
    </div>
</div>
