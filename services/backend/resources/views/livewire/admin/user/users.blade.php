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
                    <form wire:submit.prevent='destroyUser'>
                      <div class="modal-body">
                        <h3>@lang('admin_dash.are_you_sure')</h3>
                        Are you sure you want to delete this user!
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
                      <li class="breadcrumb-item">User</li>
                     
                      
                    </ol>
                    
                  </nav>
                 
                 
                </div>
                @if (Session('message'))
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
                  
                @endif
                
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header" style="display: flex;justify-content: space-between;">
                      <div class="title">
                        <input type="text" wire:model='search' class="form-control" placeholder="Search User...">
                      </div>
                      <div class=" d-flex gap-2">
                        {{-- <div class="title">
                          <select wire:model='status'  class="select2 form-select select2-hidden-accessible" >
                            <option value=""  hidden data-select2-id="2">Select</option>
                            
                            <option value="United Kingdom">visible</option>
                            <option value="United States">hilden</option>
                          </select>
                          
                        </div>
                        <button type="button"  class="btn btn-label-primary" data-bs-toggle="modal" data-bs-target="#SubCategoryModal">
                          <i class="bi bi-plus-square me-2"></i> Add New User
                        </button> --}}
          
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
                          @forelse ($user as $users)
                               
                           
                            <tr>
                                <td style="vertical-align: middle;" scope="row">{{ $users->id }}</td>
                                
                                <td style="vertical-align: middle;">{{ $users->name }}</td>
                                {{-- <td>
                                    <img src="" alt="">
                                </td> --}}
                                {{-- <img class="rounded-circle" style="height:35px;width:35px;" src="https://lh3.googleusercontent.com/a/ACg8ocLUV3Ta8hvfJE4xoJQqLRMocRpie2PJXpaV6mdZaka37WlGOA=s96-c" alt="Google Avatar">
                                <img class="rounded-circle" style="height:35px;width:35px;" src="https://lh3.googleusercontent.com/a/ACg8ocKqPCL-Hk2mVjRZkk0FxYqZKiMTp3wbdp0tP1MESQT31VDDX_G5=s96-c" alt=""> --}}
                                <td style="vertical-align: middle;">
                                  
                                    @if($users->avatar) 

                                   
                                    <img class="rounded-circle text-body-tertiary border" style="height:35px;width:35px;" src="{{ $users->avatar }}" width="25%" alt="Avatar" />
                                    @elseif($users->image)
                                    <img class="rounded-circle border" src="{{ asset('uploads/profile/' . $users->image) }}" style="height:35px;width:35px;" alt="{{ $users->name }}" class="profile-image">
                                    @else
                                    <img class="rounded-circle" src="{{ asset('uploads/profile/default.png') }}" alt="Default Avatar" class="profile-image">
                                    @endif
                                </td>
                                
                                <td style="vertical-align: middle;">
                                  {{ $users->email }}
                                </td>
                                <td style="vertical-align: middle;">
                                    @if($users->role_as == 0)
                                        User
                                    @elseif($users->role_as == 1)
                                        Admin
                                    @elseif($users->role_as == 2)
                                        Super Admin
                                    @endif
                                </td>
                               
                                {{-- <td>
                                  <span class="badge rounded-pill bg-label-{{ $users->status ? 'danger' :  'success'}} bg-label-{{ $users->status ? '<i class="bi bi-exclamation-octagon me-1"></i>' :  '<i class="bi bi-check-circle "></i>'}}">{{ $users->status == '1' ? ' Hidden':' Visible' }}</i></span>
                                </td>  --}}
                                <td style="vertical-align: middle;width:2cm;">
                                  <div class="row gy-3">
                                    <div class="col-lg-4 d-flex gap-1">
                                      <a type="button" href="{{ url('admin/user/'.$users->id.'/view') }}" class="btn btn-icon btn-label-primary" data-bs-original-title="View User" data-bs-toggle="tooltip">
                                        <i class="bi bi-eye-fill"></i>
                                      </a>
                                      {{-- <a type="button" href="{{ url('admin/category/'.$category->id.'/view') }}" class="btn btn-icon btn-label-primary" data-bs-original-title="View category" data-bs-toggle="tooltip">
                                        <i class="bi bi-eye-fill"></i>
                                      </a> --}}
                                      {{-- <a wire:click="editSubcategory({{ $users->id }})" type="button" class="btn btn-icon btn-label-secondary"  data-bs-toggle="modal" data-bs-target="#EditSubCategoryModal">
                                        <i class='bx bx-edit' ></i>
                                      </a> --}}
                                      <button type="button"  wire:click="deleteUser({{$users->id}})"  class="btn btn-icon btn-label-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered">
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
                        <ul class="pagination pagination-sm float-end" style="margin-right: 20px;">{{ $user->links()}}</ul>
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