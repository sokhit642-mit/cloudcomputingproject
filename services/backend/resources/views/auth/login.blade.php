@extends('layouts.app')
@section('title','Sign in')
@section('content')

<center>
  <div class="container">
    <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3 border rounded-2 bg-white p-4"><a
        class="d-flex flex-center text-decoration-none mb-4" href="../../../index.html">
        <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img
            src="{{ asset('front-assets/homesport-logo.png') }}" alt="phoenix" width="90"></div>
      </a>
      <div class="text-center mb-3">
        {{-- <h3 class="text-body-highlight">Sign In</h3> --}}
        <p class="text-body-tertiary">@lang('login.Get access to your accoun')</p>
      </div><a href="{{ route('google_auth') }}"  class="btn btn-phoenix-secondary w-100 mb-3 fw-normal"><svg
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
      <div class="position-relative">
        <hr class="bg-body-secondary mt-5 mb-4">
        <div class="divider-content-center">@lang('login.or use email')</div>
      </div>
      <form class="" method="POST" action="{{ route('login') }}">
        @if ($errors->any())
          @foreach ($errors->all() as $error)
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
              
                          toastr.error(@json($error));  // Use toastr.error to display errors
                      });
          </script>
          @endforeach
          @endif


          @csrf
        <div class="mb-3 text-start"><label class="form-label" for="email">@lang('login.email')</label>
          <div class="form-icon-container">
            
            <input class="form-control form-icon-input"  value="{{ old('email') }}" name="email" id="email" type="email" placeholder="@lang('login.email')" required="">
            <svg class="svg-inline--fa fa-user text-body fs-9 form-icon"
              aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img"
              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
              <path fill="currentColor"
                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z">
              </path>
            </svg><!-- <span class="fas fa-user text-body fs-9 form-icon"></span> Font Awesome fontawesome.com -->
          </div>
        </div>
        <div class="mb-3 text-start"><label class="form-label" for="password">@lang('login.password')</label>
          <div class="form-icon-container" data-password="data-password">
            <input class="form-control form-icon-input pe-6"
              id="password" name="password" type="password" placeholder="@lang('login.password')"
              required="" data-password-input="data-password-input">
            <svg
              class="svg-inline--fa fa-key text-body fs-9 form-icon" aria-hidden="true" focusable="false"
              data-prefix="fas" data-icon="key" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
              data-fa-i2svg="">
              <path fill="currentColor"
                d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z">
              </path>
            </svg><!-- <span class="fas fa-key text-body fs-9 form-icon"></span> Font Awesome fontawesome.com -->
            <a style="margin-top:-3px;margin-right: -10px;"
              class="btn  h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary"
              data-password-toggle="data-password-toggle"><i class="bi bi-eye-slash py-0 mb-4 show"></i><i class="bi bi-eye py-0 mb-4 hide"></i>
            </a>
          </div>
        </div>
        <div class=" float-end mb-2" style="margin-top: -10px;">

          <div class=" float-end">
            <a class="fs-9 fw-medium" href="{{ url('forgot-password') }}">@lang('login.Forgot Password')</a>
          </div>
        </div>
        <button class="btn btn-primary w-100 mb-3 fw-medium">@lang('login.sign in')</button>
      </form>
      <div class="text-center">
        {{-- <a class="fs-9 fw-bold" href="../../../pages/authentication/simple/sign-up.html">Create an account</a> --}}
        <a href="{{ route('register') }}" class=" fw-medium fs-9">@lang('login.create account')</a>
      </div>
    </div>
</center>

{{-- <div class="row justify-content-center mt-2">
  <div class="col-md-4">
    <div class="card">
      <div class="text-center">
        <img src="{{ asset('front-assets/homesport-logo.png') }}" width="60%" alt="mdo" class=" mt-2">
        <p>@lang('login.please singin your account')</p>
      </div>
      <div class="card-body p-4" style="margin-top: -12px;">

        <a href="{{ route('google_auth') }}" class="btn btn-phoenix-secondary w-100 mb-3 fw-normal"><svg
            class="svg-inline--fa fa-google text-danger me-2 fs-9" aria-hidden="true" focusable="false"
            data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"
            data-fa-i2svg="">
            <path fill="currentColor"
              d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
            </path>
          </svg><!-- <span class="fab fa-google text-danger me-2 fs-9"></span> Font Awesome fontawesome.com -->Sign up
          with google</a>
        <a href="{{ url('auth/facebook') }}" class="btn btn-phoenix-secondary w-100 fw-normal"><svg
            class="svg-inline--fa fa-facebook text-primary me-2 fs-9" aria-hidden="true" focusable="false"
            data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
            data-fa-i2svg="">
            <path fill="currentColor"
              d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z">
            </path>
          </svg><!-- <span class="fab fa-facebook text-primary me-2 fs-9"></span> Font Awesome fontawesome.com -->Sign
          up with facebook</a>
        <div class="position-relative mt-4">
          <hr class="bg-body-secondary">
          <div class="divider-content-center fw-normal">or</div>
        </div>
        <form class="" method="POST" action="{{ route('login') }}">

          @if ($errors->any())
          @foreach ($errors->all() as $error)
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
              
                          toastr.error(@json($error));  // Use toastr.error to display errors
                      });
          </script>
          @endforeach
          @endif


          @csrf
          <div class="row g-3 ">
            <div class="col-12">
              <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class="bi bi-envelope"></i></span>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                  placeholder="@lang('login.email')" required="" autofocus="">
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-12">
              <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="@lang('login.password')"
                  required="">
              </div>
            </div>

          </div>
          <label for="" class="form-check-label d-block lh-sm fs-9 text-body text-end fw-normal mb-0">
            <a href="{{ url('forgot-password') }}" class="text-primary fs-9">Forgot Password?</a>
            <input type="checkbox" class="form-check-input mt-0 me-1" value="remember-me">@lang('login.remember me')
          </label>

          <div class="checkbox mb-3">

          </div>
          <div class="text-center">
            <button class="btn btn-sm btn-primary w-100 py-2" type="submit">@lang('login.sign in')</button>
            <label>
              <a href="{{ route('register') }}" class=" fs-9">@lang('login.create account')</a>
            </label>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> --}}
</div>
<br>
@endsection
@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
      const passwordInput = document.querySelector('[data-password-input="data-password-input"]');
      const toggleButton = document.querySelector('[data-password-toggle="data-password-toggle"]');
      const showIcon = toggleButton.querySelector(".show");
      const hideIcon = toggleButton.querySelector(".hide");
  
      toggleButton.addEventListener("click", function () {
          if (passwordInput.type === "password") {
              passwordInput.type = "text";
              showIcon.style.display = "none";
              hideIcon.style.display = "inline";
          } else {
              passwordInput.type = "password";
              showIcon.style.display = "inline";
              hideIcon.style.display = "none";
          }
      });
  });
  </script>
  
@endpush