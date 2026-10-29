@extends('layouts.admin')
@section('title')
Admin | Create
@endsection
@section('content')



{{--
<livewire:admin.category.index /> --}}


@section('content')



{{--
<livewire:admin.user.admins /> --}}
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
              <form wire:submit.prevent='destroySubcategory'>
                <div class="modal-body">
                  <h3>@lang('admin_dash.are_you_sure')</h3>
                  @lang('admin_dash.you want to delete this sub_category !')
                </div>
                <br>
                <div class="">
                  <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">@lang('admin_dash.cancel')</button>
                  <button type="submit" class="btn btn-danger"
                    data-bs-dismiss="modal">@lang('admin_dash.delete')</button>
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
            <a href="{{ url('admin/category/create') }}" type="button" data-bs-original-title="Add New Category"
              data-bs-toggle="tooltip" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>
          </nav> --}}
        </div>
        {{-- <h1>Sub Categoey</h1> --}}
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Create</li>


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
        <form action="{{ route('adminRegister.submit') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card">
            <h5 class="card-header">Create admin</h5>
            <div class="card-body border-bottom">
              
                  @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <script>
                      document.addEventListener('DOMContentLoaded', function () {
                          toastr.error(@json($error));
                      });
                    </script>
                    @endforeach
                  @endif

                <div class="row">
                  <div class="col-md-2 d-flex flex-column align-items-center">
                    <!-- Image preview -->
                    <div id="image-preview-container" class="rounded-2" style="cursor: pointer;">
                        <img id="image-preview" class="rounded-5 border-3"
                            src="https://s3.amazonaws.com/cms.ipressroom.com/366/files/20206/5f1f39632cfac26b7c32af6f_generic-person-icon/generic-person-icon_square.jpg?nocache=883"
                            alt="Profile" style="max-width: 100%; height: auto; border-radius: 8px;">
                    </div>
                    <!-- File input -->
                    <input type="file" id="image" class="form-control" name="image" style="display: none;" accept="image/*">
                  </div>
                  <div class="col-md-5">
                    <div class="form-floating">
                      <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder=""
                        required>
                      <label for="name">Full Name</label>
                    </div>
                    <div class="form-floating mt-4">
                      <input type="password" name="password" class="form-control" placeholder="" required>
                      <label for="password">Password</label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-floating">
                      <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder=""
                        required>
                      <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mt-4">
                      <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm "
                        required>
                      <label for="password_confirmation">Confirm Password</label>
                    </div>
                  </div>

                </div>
                
              



            </div>
          </div>
          <div class=" float-end mt-3 d-flex col-2 gap-2 mt-3">
            <a href="{{url('admin/admins')}}" class="btn btn-warning w-100 py-2">Back</a>
            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>



  </div>
  {{-- @push('scripts')

  <script>
    window.addEventListener('closeModal', event => {
    
          $('#SubCategoryModal').modal('hide');
          $("#EditSubCategoryModal").modal('hide');  
        });
  </script>

  @endpush --}}
</div>



@endsection
@push('scripts')
<script>
  document.getElementById('image-preview-container').addEventListener('click', function() {
        document.getElementById('image').click();
    });

    document.getElementById('image').addEventListener('change', function(event) {
        var input = event.target;
        var preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]); // Convert the image file to a data URL
        } else {
            preview.src = 'https://bit.ly/3ubuq5o'; // Reset to default image
        }
    });
</script>
@endpush