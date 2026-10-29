<div>
    <div>
        <div>
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
                        <form wire:submit.prevent='destroyAdmin'>
                          <div class="modal-body">
                            <h3>@lang('admin_dash.are_you_sure')</h3>
                            Are you sure you want to delete this admin!!
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
              
               {{-- @include('livewire.admin.sub-category.modal-form') --}}
                  <div class="pagetitle">
                      <div class="row" style="float: right;margin-top: 2px;">
                          {{-- <nav>
                              <a href="{{ url('admin/category/create') }}" type="button" data-bs-original-title="Add New Category" data-bs-toggle="tooltip" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>
                          </nav> --}}
                      </div>
                      {{-- <h1>Sub Categoey</h1> --}}
                      <nav>
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
                          <li class="breadcrumb-item">Admin</li>
                         
                          
                        </ol>
                        
                      </nav>
                     
                     
                    </div>
                    @if (Session::has('message'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                // Set Toastr options
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

                                // Get the alert type and display the appropriate Toastr notification
                                let type = @json(Session::get('alert-type', 'success')); // Default to 'success'

                                switch(type){
                                    case 'info':
                                        toastr.info(@json(Session::get('message')));
                                        break;

                                    case 'warning':
                                        toastr.warning(@json(Session::get('message')));
                                        break;

                                    case 'error':
                                        toastr.error(@json(Session::get('message')));
                                        break;

                                    case 'success':
                                        toastr.success(@json(Session::get('message')));
                                        break;
                                }
                            });
                        </script>
                    @endif
                    
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-header" style="display: flex;justify-content: space-between;">
                          <div class="title">
                            <input type="text" wire:model='search' class="form-control" placeholder="Search Admin...">
                          </div>
                          <div class=" d-flex gap-2">
                            {{-- <div class="title">
                              <select wire:model='status'  class="select2 form-select select2-hidden-accessible" >
                                <option value=""  hidden data-select2-id="2">Select</option>
                                
                                <option value="United Kingdom">visible</option>
                                <option value="United States">hilden</option>
                              </select>
                              
                            </div> --}}
                            <a class="btn btn-label-primary" href="{{url('admin/create')}}">
                              <i class="bi bi-plus-square me-2"></i> Add New Admin
                            </a>
              
                          </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                          <table class="dt-multilingual table border-top dataTable no-footer dtr-column collapsed border-bottom">
                            <thead class="table-secondary">
                              <tr>
                                <th >#</th>
                                  <th style="font-size: 12px;">@lang('admin_dash.name')</th>
                                  <th style="font-size: 12px;">Image</th>
                                  <th style="font-size: 12px;">Email</th>
                                  <th style="font-size: 12px;">Role</th>
                                  {{-- <th style="font-size: 12px;">@lang('admin_dash.status')</th> --}}
                                  <th style="font-size: 12px;">@lang('admin_dash.action')</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                              @forelse ($admin as $admins)
                                   
                               
                                <tr>
                                    <td style="vertical-align: middle;" scope="row">{{ $admins->id }}</td>
                                    
                                    <td style="vertical-align: middle;">{{ $admins->name }}</td>
                                   
                                    <td style="vertical-align: middle;">
                                        @if($admins->avatar) 
                                        <img class="rounded-circle text-body-tertiary border" style="height:35px;width:35px;" src="{{ $admins->avatar }}" width="25%" alt="Avatar" />
                                        @elseif($admins->image)
                                        <img class="rounded-circle border" src="{{ asset('uploads/adminprofile/' . $admins->image) }}" style="height:55px;width:55px;" alt="{{ $admins->name }}" class="profile-image">
                                        @else
                                        <img class="rounded-circle" src="{{ asset('uploads/profile/default.png') }}" alt="Default Avatar" class="profile-image">
                                        @endif
                                    </td>
                                    
                                    <td style="vertical-align: middle;">
                                      {{ $admins->email }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        @if($admins->role == 0)
                                            User
                                        @elseif($admins->role == 1)
                                          <div class="border rounded-2 text-center p-1">
                                            Admin
                                          </div>
                                            
                                        @elseif($admins->role == 2)
                                            Super Admin
                                        @endif
                                    </td>
                                   
                                    {{-- <td>
                                      <span class="badge rounded-pill bg-label-{{ $admins->status ? 'danger' :  'success'}} bg-label-{{ $admins->status ? '<i class="bi bi-exclamation-octagon me-1"></i>' :  '<i class="bi bi-check-circle "></i>'}}">{{ $admins->status == '1' ? ' Hidden':' Visible' }}</i></span>
                                    </td>  --}}
                                    <td style="vertical-align: middle;width:2cm;">
                                      <div class="row gy-3">
                                        <div class="col-lg-4 d-flex gap-1">
                                            <a type="button" href="{{ url('admin/'.$admins->id.'/view') }}" class="btn btn-icon btn-label-primary" data-bs-original-title="View Admin" data-bs-toggle="tooltip">
                                              <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a type="button" href="{{ route('admin.edit', $admins->id) }}" class="btn btn-icon btn-label-primary" data-bs-original-title="Edit admin" data-bs-toggle="tooltip">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                          {{-- <a wire:click="editSubcategory({{ $admins->id }})" type="button" class="btn btn-icon btn-label-secondary"  data-bs-toggle="modal" data-bs-target="#EditSubCategoryModal">
                                            <i class='bx bx-edit' ></i>
                                          </a> --}}
                                          <button type="button"  wire:click="deleteAdmin({{$admins->id}})"  class="btn btn-icon btn-label-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                            <i class='bx bxs-trash' ></i>
                                          </button>
                                        </div>
                                      </div>
    
                                       
                                        
                                    </div>
                                    </td>
                                </tr>
                                    
                                        
              
                                    
                                @empty
                                  <tr class="text-center">
                                    <td colspan="8" style="color: rgb(255, 0, 0);">ស្វែងរកអ្នកប្រើប្រាស់អត់ឃើញទេ!!</td>
                                  </tr>
                                @endforelse
                            </tbody>
                          </div>
                         
                          </table>
                          <div> 
                            <ul class="pagination pagination-sm float-end" style="margin-right: 20px;">{{ $admin->links()}}</ul>
                          </div>
                          
                        </div>
                      </div>
                      
                      
                  </div>
              </div>
              
             
              
        </div>
        @push('scripts')
          
          <script>
            window.addEventListener('closeModal', event => {
        
              $('#SubCategoryModal').modal('hide');
              $("#EditSubCategoryModal").modal('hide');  
            });
          </script>
        
        @endpush
    </div>
</div>
