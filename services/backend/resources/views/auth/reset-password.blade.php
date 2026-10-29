@extends('layouts.app')
@section('title','Forgot password')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                {{-- @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif --}}
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
                <div class="row flex-center py-5">
                    <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3 border rounded-2 bg-white p-4"><a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.html">
                        <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                            <img src="{{ asset('front-assets/homesport-logo.png') }}" alt="phoenix" width="90">
                        </div>
                      </a>
                      <div class="text-center mb-3">
                        <h4 class="text-body-highlight">Reset new password</h4>
                        <p class="text-body-tertiary">Type your new password</p>
                        <form class="mt-5" action="{{ route('reset.password') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="position-relative form-icon-container mb-2" data-password="data-password">
                                <input name="password" required class="form-control form-icon-input pe-6" id="password" type="password" placeholder="Type new password" data-password-input="data-password-input">
                                <svg
                                    class="svg-inline--fa fa-key text-body fs-9 form-icon" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="key" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z">
                                    </path>
                                </svg>
                                <a style="margin-top:-3px;margin-right: -10px;" class="btn h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" data-password-toggle="data-password-toggle">
                                    <i class="bi bi-eye-slash py-0 mb-4 show"></i>
                                    <i class="bi bi-eye py-0 mb-4 hide" style="display: none;"></i>
                                </a>
                            
                            </div>
                            <div class="position-relative form-icon-container mb-4" data-password="data-password">
                                <input id="password_confirmation" name="password_confirmation" required class="form-control form-icon-input pe-6" id="confirmPassword" type="password" placeholder="Cofirm new password" data-password-input="data-password-input">
                                <svg
                                    class="svg-inline--fa fa-key text-body fs-9 form-icon" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="key" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z">
                                    </path>
                                </svg>
                                <a style="margin-top:-3px;margin-right: -10px;" class="btn h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" data-password-toggle="data-password-toggle">
                                    <i class="bi bi-eye-slash py-0 mb-4 show"></i>
                                    <i class="bi bi-eye py-0 mb-4 hide" style="display: none;"></i>
                                </a>
                            
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Set Password</button>
                        </form>
                      </div>
                    </div>
                  </div>
                {{-- <div class="card">
                    <div class="text-center">
                        <img src="{{ asset('front-assets/homesport-logo.png') }}" width="50%" alt="mdo"  class=" mt-2">
                        
                    </div>
                    <div class="card-body">
                        <hr>
                        <form action="{{ route('reset.password') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" placeholder="New Password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" placeholder="Confirm Password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <div class=" float-end">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </form>
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        
                    </div>
                    
                    
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleButtons = document.querySelectorAll('[data-password-toggle="data-password-toggle"]');
        
        toggleButtons.forEach(toggleButton => {
            const passwordInput = toggleButton.closest('.position-relative').querySelector('[data-password-input="data-password-input"]');
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
    });
</script>
@endpush
