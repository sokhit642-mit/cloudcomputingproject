@extends('layouts.app')
@section('title','Register Form')
@section('content')

<div class="container">
    <div class="row flex-center">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3 border p-4 bg-white rounded-2">
            <a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.html">
            <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="{{ asset('front-assets/homesport-logo.png') }}" alt="phoenix" width="90"></div>
          </a>
          <div class="text-center mb-3">
            {{-- <h3 class="text-body-highlight fs-9">Sign Up</h3> --}}
            <p class="text-body-tertiary">@lang('login.Create your account today')</p>
          </div>
          <a href="{{ route('google_auth') }}"  class="btn btn-phoenix-secondary w-100 mb-3 fw-normal"><svg
            class="svg-inline--fa fa-google text-danger me-2 fs-9" aria-hidden="true" focusable="false" data-prefix="fab"
            data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" data-fa-i2svg="">
            <path fill="currentColor"
              d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
            </path>
          </svg><!-- <span class="fab fa-google text-danger me-2 fs-9"></span> Font Awesome fontawesome.com -->@lang('login.Sign in with google')</a><a href="{{ url('auth/facebook') }}" class="btn btn-phoenix-secondary w-100 fw-normal"><svg
            class="svg-inline--fa fa-facebook text-primary me-2 fs-9" aria-hidden="true" focusable="false"
            data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
            data-fa-i2svg="">
            <path fill="currentColor"
              d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z">
            </path>
          </svg><!-- <span class="fab fa-facebook text-primary me-2 fs-9"></span> Font Awesome fontawesome.com --> @lang('login.Sign in with facebook')</a>
          <div class="position-relative mt-4">
            <hr class="bg-body-secondary">
            <div class="divider-content-center">@lang('login.or use email')</div>
          </div>
          <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class=" text-center">
                <img id="image-preview" src="https://s3.amazonaws.com/cms.ipressroom.com/366/files/20206/5f1f39632cfac26b7c32af6f_generic-person-icon/generic-person-icon_square.jpg?nocache=883" alt="Image Preview" class="img-thumbnail mb-2" style="width: 150px;">

                {{-- <label for="image" class="form-label">Profile Image</label> --}}
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                {{-- <small class="text-muted">Max file size: 2MB</small> --}}
            </div>
                <div class="mb-3 text-start">
                    <label class="form-label" for="name">@lang('login.name')</label>
                    <input id="name" type="text" placeholder="@lang('login.name')" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label" for="email">@lang('login.email')</label>
                    <input id="email" type="email" placeholder="@lang('login.email')" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="password">@lang('login.password')</label>
                        <div class="position-relative">
                            <input 
                                class="form-control form-icon-input pe-6 @error('password') is-invalid @enderror" 
                                id="password" 
                                placeholder="@lang('login.password')" 
                                name="password"  
                                autocomplete="new-password" 
                                type="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button 
                                type="button" 
                                class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" 
                                data-password-toggle>
                                <span class="uil uil-eye" style="display: none;"></span> <!-- Hidden initially -->
                                <span class="uil uil-eye-slash" style="display: inline;"></span> <!-- Visible initially -->
                            </button>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <label class="form-label" for="password-confirm">@lang('login.Confirm Password')</label>
                        <div class="position-relative">
                            <input 
                                class="form-control form-icon-input pe-6 @error('password_confirmation') is-invalid @enderror" 
                                id="password-confirm" 
                                placeholder="@lang('login.Confirm Password')" 
                                name="password_confirmation" 
                                required  
                                autocomplete="new-password" 
                                type="password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button 
                                type="button" 
                                class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" 
                                data-password-toggle>
                                <span class="uil uil-eye" style="display: none;"></span> <!-- Hidden initially -->
                                <span class="uil uil-eye-slash" style="display: inline;"></span> <!-- Visible initially -->
                            </button>
                        </div>
                    </div>
                    
                    
                </div>
                {{-- <div class="form-check mb-3"> --}}
                    {{-- <input class="form-check-input"  id="termsService" type="checkbox"><label class="form-label fs-9 text-transform-none" for="termsService">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label></div> --}}
                    <button class="btn btn-primary fw-medium w-100 mb-1">@lang('login.Sign up')</button>
                {{-- <div class="text-center"><a class="fs-9 fw-bold" href="../../../pages/authentication/simple/sign-in.html">Sign in to an existing account</a></div> --}}
          </form>
        </div>
    </div>
   
</div>
<br>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('[data-password-toggle]').forEach(toggle => {
        toggle.addEventListener('click', function () {
            const input = this.previousElementSibling; // Select the input element before the toggle button
            const slashIcon = this.querySelector('.uil-eye-slash');
            const eyeIcon = this.querySelector('.uil-eye');

            if (input.type === 'password') {
                input.type = 'text'; // Show password
                slashIcon.style.display = 'none'; // Hide slash eye icon
                eyeIcon.style.display = 'inline'; // Show simple eye icon
            } else {
                input.type = 'password'; // Hide password
                slashIcon.style.display = 'inline'; // Show slash eye icon
                eyeIcon.style.display = 'none'; // Hide simple eye icon
            }
        });
    });
</script>



<script>
    // Preview Image
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('image-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush
