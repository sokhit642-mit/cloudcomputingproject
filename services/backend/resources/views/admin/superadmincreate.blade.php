<div class="col-lg-12">
    <form action="{{ route('superadmin.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card">
        <h5 class="card-header">Create admin</h5>
        <div class="card-body border-bottom">
          
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                <script>
                  document.addEventListener('DOMContentLoaded', function () {
                      alert.error(@json($error));
                  });
                </script>
                @endforeach
              @endif

            <div class="row">
              <div class="col-md-2 d-flex flex-column align-items-center">
                <!-- Image preview -->
                {{-- <div class="" id="image-preview-container rounded-2" style="cursor: pointer;">
                  <img id="image-preview" class="rounded-5 border-3"
                    src="https://s3.amazonaws.com/cms.ipressroom.com/366/files/20206/5f1f39632cfac26b7c32af6f_generic-person-icon/generic-person-icon_square.jpg?nocache=883"
                    alt="Profile" style="max-width: 90%; height: auto;border-radius:8px;">
                </div> --}}
                <!-- File input -->
                <input type="file" id="image" class="form-control" name="image">
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