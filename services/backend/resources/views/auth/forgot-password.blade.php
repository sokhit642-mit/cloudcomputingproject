@extends('layouts.app')
@section('title','Forgot password')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row flex-center">
                <div class="col-sm-10 col-md-8 col-lg-5 col-xxl-4 border p-4 rounded-2 bg-white"><a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.html">
                    <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="{{ asset('front-assets/homesport-logo.png') }}" alt="phoenix" width="90"></div>
                  </a>
                  <div class="px-xxl-5">
                    <div class="text-center mb-6">
                      <h4 class="text-body-highlight">@lang('login.Forgot Password')</h4>
                      <p class="text-body-tertiary mb-5 fs-10 mt-1">@lang('login.Enter your email below and we will send you a reset link')</p>
                      <form {{ route('send.reset.token') }}  method="POST" class="d-flex align-items-center mb-5 form-icon-container">
                        @csrf
                        <input class="form-control form-icon-input flex-1" id="email" name="email" type="email" required placeholder="@lang('login.email')">
                        <svg class="svg-inline--fa fa-user text-body fs-9 form-icon"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z">
                            </path>
                        </svg>
                        <button class="btn btn-primary ms-2 fw-medium">@lang('login.send')<svg class="svg-inline--fa fa-chevron-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path></svg><!-- <span class="fas fa-chevron-right ms-2"></span> Font Awesome fontawesome.com --></button></form>
                      {{-- <a class="fs-9 fw-bold" href="#!">Still having problems?</a> --}}
                    </div>
                  </div>
                </div>
            </div>
            
            {{-- <div class="col-md-6">
               
                <div class="card">
                    <div class="text-center">
                        <img src="{{ asset('front-assets/homesport-logo.png') }}" width="50%" alt="mdo"  class=" mt-2">

                    </div>
                    
                    <div class="card-body">
                        <hr>
                        <form action="{{ route('send.reset.token') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" placeholder="Email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class=" float-end">
                                <button type="submit" class="btn btn-primary">Send Reset Link</button>
    
                            </div>
                        </form>
                    </div>
                    
                    
                </div>
            </div> --}}
        </div>
    </div>
    <br>
@endsection