<div>
  <div>
      <div>
          <div wire:ignore.self class="modal fade" id="verticalycentered" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                
                <br>
                <br>
                <center>
                  <h1 class="text-warning"><i class="bi bi-exclamation-triangle fa-2x"></i></h1>
                  <form wire:submit.prevent='destroySlider'>
                    <div class="modal-body">
                      <h3>@lang('admin_dash.are_you_sure')</h3>
                      @lang('admin_dash.you want to delete this slider !')
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
       
         @include('livewire.admin.sliders.modal-form')
            <div class="pagetitle">
                <div class="row" style="float: right;margin-top: 2px;">
                    
                </div>
                {{-- <h1>Sliders</h1> --}}
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
                    <li class="breadcrumb-item">@lang('admin_dash.slider')</li>
                   
                    
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
         
              <div class="col-lg-12">
              
                <div> 
                  <div  style="display: flex;justify-content: space-between;">
                    <div class="col-sm-6">
                     
                     
                    </div></div>
                  </div>
                  
                <div class="card">
                  <div class="card-header" style="display: flex;justify-content: space-between;">
                    <div class="title">
                      <input type="search" wire:model='search' class="form-control" placeholder="@lang('admin_dash.search_slider')...">
  
                    </div>
                    <a href="{{ url('admin/sliders/create') }}"  class="btn btn-label-primary">
                      <i class="bi bi-plus-square me-2"></i> @lang('admin_dash.add_slider')
                    </a>
                    {{-- <button type="button"  class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#SliderModal">
                      <i class="bi bi-plus-circle"></i>
                    </button> --}}
                   
                  </div>
                 
                    
                    
                    
                   
                    <div  class="table-responsive">
                      <!-- Default Table -->
                      <table class="dt-multilingual table border-top dataTable no-footer dtr-column collapsed border-bottom">
                       
                            
                        <thead class="table-secondary">
                          <tr>
                            <th style="font-size: 12px;">#</th>
                            <th style="font-size: 12px;">@lang('admin_dash.slider_title')</th>
                            <th style="font-size: 12px;">@lang('admin_dash.slider_desc')</th>
                            <th style="font-size: 12px;">@lang('admin_dash.slider_image')</th>
        
                            <th style="font-size: 12px;">@lang('admin_dash.status')</th>
                            <th style="font-size: 12px;">@lang('admin_dash.action')</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          @forelse ($sliders as $slider)
                                 
                             
                         
                              <tr>
                                 <td style="vertical-align: middle;">{{ $slider->id }}</td>
                                 <td style="vertical-align: middle;">{{ $slider->title }}</td>
                                 <td style="vertical-align: middle;">{{ $slider->description }}</td>
                                 <td style="vertical-align: middle;">
                                  <img class="rounded" width="180" src="{{ asset('uploads/slider/'.$slider->image) }}" alt="">
                                 </td>
                                 {{-- <td><img src="{{ Storage::url($slider->image) }}" alt="cover image"></td> --}}
                                 <td style="vertical-align: middle;">
                                    <span class="badge rounded-pill bg-{{ $slider->status ? 'danger' :  'success'}} bg-{{ $slider->status ? '<i class="bi bi-exclamation-octagon me-1"></i>' :  '<i class="bi bi-check-circle "></i>'}}">{{ $slider->status == '1' ? ' Hidden':' Visible' }}</i></span>
                                 </td>
                                 <td style="vertical-align: middle;width:2cm;">
                                  <div class="row gy-3">
                                    <div class="col-lg-4 d-flex gap-1">
          
                                      
                                      <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" type="button" class="btn btn-icon btn-label-secondary">
                                        <i class='bx bx-edit' ></i>
                                      </a>
                                      <button type="button" wire:click="deleteSlider({{$slider->id}})"  class="btn btn-icon btn-label-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                        <i class='bx bxs-trash' ></i>
                                      </button>
                                    </div>
                                  </div>
                                  
                              </div>
                              </td>
                              </tr>
                              
                                  
        
                             
                          @empty
                            <tr class="text-center">
                              <td colspan="10" style="color: rgb(255, 0, 0);">No slider add!!</td>
                            </tr>
                          @endforelse
        
                        </tbody>
                      </table>
                      
                    </div> 
                    <!-- End Default Table Example -->
                 
                   <div class="card-footer">
                    <ul class="pagination pagination-sm float-end" style="margin-right: 25px;text-align:center;">{{ $sliders->links() }}</ul>
                    
                    </ul>
                   </div>
                    
                </div>
                
            </div>
        </div>
        
       
        
  </div>
   @push('script')
        
          <script>
            window.addEventListener('closeModal', event => {
        
              $('#BrandModal').modal('hide');
              $("#BrandEditModal").modal('hide');  
            });
          </script>
          
  @endpush
</div>