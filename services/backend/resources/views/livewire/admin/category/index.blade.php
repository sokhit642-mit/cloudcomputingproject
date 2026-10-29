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
          <form wire:submit.prevent='destroyCategory'>
            <div class="modal-body">
              <h3>@lang('admin_dash.are_you_sure')</h3>
              <p>@lang('admin_dash.you want to delete this category !')</p>
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
 
{{-- aaaaa --}}
{{-- <div wire:ignore.self class="modal fade" id="viewModal" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Category Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent='viewCategory' enctype="multipart/form-data">
          @csrf
          <div class="tab-content pt-2">

            <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Category Name</div>
                <div class="col-lg-9 col-md-8">{{$category->name}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Slug</div>
                <div class="col-lg-9 col-md-8">{{$category->slug}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Status</div>
                <div class="col-lg-9 col-md-8"><span class="badge rounded-pill bg-{{ $category->status ? 'danger' :  'success'}} bg-{{ $category->status ? '<i class="bi bi-exclamation-octagon me-1"></i>' :  '<i class="bi bi-check-circle "></i>'}}">{{ $category->status == '1' ? ' Hidden':' Visible' }}</i></span></div>
              </div>
              <h5 class="card-title">Description</h5>
              <p class="small fst-italic">{{$category->description}}</p>
             

            

          </div>
      </form>
      </div>
      
    </div>
  </div>
</div> --}}
  {{-- aaa --}}
  @include('livewire.admin.category.modal-form-create')

    <div class="pagetitle">
        <div class="row" style="float: right;margin-top: 2px;">
            {{-- <nav>
                <a href="{{ url('admin/category/create') }}" type="button" data-bs-original-title="Add New Category" data-bs-toggle="tooltip" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>
            </nav> --}}
        </div>
        {{-- <h1>Category</h1> --}}
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
            <li class="breadcrumb-item">@lang('admin_dash.category')</li>
           
            
          </ol>
          
        </nav>
       
       
      </div>
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
      {{-- @if (Session('message'))
        <script>
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
            customClass: {
              popup: 'swal-toast-popup',
              title: 'swal-toast-title'
            }
          });

          Toast.fire({
            icon: "success",
            title: @json(Session::get('message'))
          });
        </script>
        
      @endif --}}
      {{-- @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                  </svg>
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  
                  {{ session('message') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  
                </div>
      @endif --}}
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header" style="display: flex;justify-content: space-between;">
            <div class="title">
              <input type="text" wire:model='search' class="form-control" placeholder="@lang('admin_dash.search_category')...">
            </div>
            <div class=" d-flex gap-2">
              {{-- <div class="btn-group">
                <button type="button" class="btn btn-label-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-export me-2'></i>Exports</button>
                <ul class="dropdown-menu" style="">
                  <li><a class="dropdown-item" href="javascript:void(0);"><i class='bx bx-printer me-1 mb-1' ></i>Print</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);"><i class='bx bxs-file-export me-1 mb-1' ></i>Excel</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);"><i class='bx bxs-file-pdf me-1 mb-1' ></i>Pdf</a></li>
                 
                </ul>
              </div> --}}
              <a href="{{ url('admin/category/create') }}" class="btn btn-label-primary "><i class="bi bi-plus-square me-2"></i>@lang('admin_dash.add_category')</a>

            </div>
          </div>
          <div class="table-responsive text-nowrap">
            <table class="dt-multilingual table border-top dataTable no-footer dtr-column collapsed border-bottom">
              <thead class="table-secondary">
                <tr>
                  <th style="font-size: 12px;">#</th>
                  <th style="font-size: 12px;">@lang('admin_dash.name') </th>
                  <th style="font-size: 12px;">@lang('admin_dash.image')</th>
                  <th style="font-size: 12px;">@lang('admin_dash.slug')</th>

                  <th style="font-size: 12px;">@lang('admin_dash.status')</th>
                  <th style="font-size: 12px;">@lang('admin_dash.action')</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($categories as $category)
                  <tr>
                      <td style="vertical-align: middle;" scope="row">{{ $category->id }}</td>
                      <td style="vertical-align: middle;">
                        {{ $category->name }}
                      </td>
                      <td style="vertical-align: middle;">
                        <img class="rounded" width="50" style="margin-right: 10px" src="{{ asset('uploads/category/'.$category->image) }}" alt="">

                      </td>
                      <td style="vertical-align: middle;">{{ $category->slug }}</td>
                      
                      <td style="vertical-align: middle;">
                          <span class="badge rounded-pill  bg-label-{{ $category->status ? 'danger' :  'success'}}  bg-label-{{ $category->status ? '<i class="bi bi-exclamation-octagon me-1"></i>' :  '<i class="bi bi-check-circle "></i>'}}">{{ $category->status == '1' ? ' Hidden':' Visible' }}</i></span>
                          {{-- <span class="right badge badge-{{ $category->status ? 'success' : 'danger' }}">{{$category->status ? __('visible') : __('hilden') }}</span> --}}
                      </td> 
                      <td class="" style="vertical-align: middle;width:2cm;">
                        <div class="row gy-3">
                          <div class="col-lg-4 d-flex gap-1">

                            <a type="button" href="{{ url('admin/category/'.$category->id.'/view') }}" class="btn btn-icon btn-label-primary" data-bs-original-title="@lang('admin_dash.view_category')" data-bs-toggle="tooltip">
                              <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ url('admin/category/'.$category->id.'/edit') }}" type="button" class="btn btn-icon btn-label-secondary" data-bs-original-title="@lang('admin_dash.edit_category')" data-bs-toggle="tooltip">
                              <i class='bx bx-edit' ></i>
                            </a>
                            <button type="button"  wire:click="deleteCategory({{$category->id}})"  class="btn btn-icon btn-label-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                              <i class='bx bxs-trash' ></i>
                            </button>
                          </div>
                        </div>

                      </td>
                  </tr>
                  @empty
                    <tr class="text-center" >
                      <td colspan="8" style="color: rgb(255, 0, 0);">No Category Found</td>
                    </tr>
                  @endforelse
              </tbody>
            </div>
           
            </table>
            <div> 
              <ul class="pagination pagination-sm float-end" style="margin-right: 20px;">{{ $categories->links()}}</ul>
            </div>
      
          </div>
        </div>
        
        
    </div>
</div>

@push('script')

  <script>
    window.addEventListener('close-modal', event => {

      $('#verticalycentered').modal('hide');
    });
  </script>

@endpush
