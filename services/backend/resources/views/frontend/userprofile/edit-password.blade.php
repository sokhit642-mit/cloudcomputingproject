@extends('layouts.app')
@section('title','Edit Password')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row align-items-center g-3 text-center text-xxl-start">
                    <div class="col-12 col-xxl-auto">
                        @if(Auth::check())
                            @if(Auth::user()->avatar)
                                <div class="avatar avatar-5xl">
                                    {{-- <img class="rounded-circle" src="../../assets/img/team/33.webp" alt=""></div> --}}
                                    <img class="rounded-circle" style="width: 150px;" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}'s Avatar" />
                                </div>
                                <!-- If logged in with Google or Facebook, show the avatar -->
                            @elseif(Auth::user()->image)
                                <!-- If registered normally and has an uploaded image -->
                                <div class="avatar avatar-5xl">
                                    <img class="rounded-circle" style="width: 150px;" src="{{ asset('uploads/profile/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="profile-image">
                                </div>
                            @else
                            <!-- Default image if no avatar or uploaded image -->
                            <img class="rounded-4" style="width: 150px;" src="{{ asset('uploads/profile/default.png') }}"
                                alt="Default Avatar" class="profile-image">
                            @endif
                        @endif
                        
                    </div>
                    <div class="col-12 col-sm-auto flex-1">
                      <h3 class="fw-bolder mb-2">{{ Auth::user()->name }}</h3>
                      {{-- <p class="mb-0">Total Order: {{$userOrderCount}}</p> --}}
                      {{-- <a class="fw-bold" href="#!">{{$userOrderCount}}</a> --}}
                      
                    </div>
                  </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-5 justify-content-between">
                    <h5>About {{ Auth::user()->name }}</h5><a class="btn btn-subtle-primary btn-sm px-3" href="{{url('edit-profile')}}">Edit</a>
                  </div>
                  <div class="mb-4">
                    <div class="d-flex align-items-center mb-1"><i class="uil uil-envelope-minus me-2"></i>
                      <h5 class="text-body-highlight mb-0">Email</h5>
                    </div><a href="mailto:shatinon@jeemail.com:">{{ Auth::user()->email }}</a>
                  </div>
                  <div class="mb-4">
                    <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-phone"> </span>
                      <h5 class="text-body-highlight mb-0">Phone</h5>
                    </div>
                    <p href="tel:+1234567890">
                        @if ( Auth::user()->phone == "" )
                            <p class="mb-0 text-body-secondary">Phone number is not provided</p>
                        @else
                            {{ Auth::user()->phone }}  
                        @endif
                        
                    </p>
                  </div>
                  <div class="mb-4">
                    <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-estate"></span>
                      <h5 class="mb-0">Address</h5>
                    </div>
                    <p class="mb-0 text-body-secondary">
                        @if ( Auth::user()->address == "" )
                            <p class="mb-0 text-body-secondary">Adress is not provided</p>
                        @else
                            {{ Auth::user()->address }}  
                        @endif
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-subtle-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ url('change-password') }}" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <div class="card">
                   

                    <div class="card-header fw-bold">Update Your Password</div>
                    {{-- <h5 class="card-header pb-0 text-sm-start text-center mb-4">Order History</h5> --}}
                    <div class="card-body">
                        @if (Auth::user()->google_id || Auth::user()->facebook_id)
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="address" cols="10" rows="5">{{ Auth::user()->address }}</textarea>
                                </div>
                               
                            </div>

                            
                        @else
                        <div class="row">
                            <!-- Name -->
                            
                           
                        
                            <!-- Password Fields -->
                            <div class="col-md-6 form-icon-container">
                                <label for="old-password" class="form-label">Old Password</label>
                                <input type="password" class="form-control form-icon-input" placeholder="Current Password" id="current_password" name="old-password" data-password-input="true">
                                <svg
                                    class="svg-inline--fa fa-key text-body fs-9 form-icon mt-4 ml-2" style="margin-left: 10px;" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="key" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z">
                                    </path>
                                </svg>
                                <a style="margin-top: 20px;margin-right: 3px;" class="btn h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" data-password-toggle="data-password-toggle">
                                    <i class="bi bi-eye-slash py-0 mb-4 show"></i>
                                    <i class="bi bi-eye py-0 mb-4 hide" style="display: none;"></i>
                                </a>
                                @error('old-password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 form-icon-container">
                                <label for="new-password" class="form-label">New Password</label>
                                <input type="password" class="form-control form-icon-input" placeholder="New Password" id="new-password" name="new-password" data-password-input="true">
                                <svg
                                    class="svg-inline--fa fa-key mt-4 text-body fs-9 form-icon" style="margin-left: 10px;" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="key" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z">
                                    </path>
                                </svg>
                                <a style="margin-top: 20px;margin-right: 3px;" class="btn h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" data-password-toggle="data-password-toggle">
                                    <i class="bi bi-eye-slash py-0 mb-4 show"></i>
                                    <i class="bi bi-eye py-0 mb-4 hide" style="display: none;"></i>
                                </a>
                                @error('new-password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                        
                            </div>
                            <div class="col-md-12 mt-2">
                                <a href="{{ url('forgot-password') }}"  class="text-primary fs-9">Forgot Password?</a>
                            </div>
                        
                            {{-- <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div> --}}
                        </div>
                        @endif
                            
                            
                        
                    </div>
                </div>
                <div class="mt-2 d-flex float-end gap-2">
                    <a href="{{url('/profile')}}" class="btn btn-warning">Profile</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const toggleButtons = document.querySelectorAll('[data-password-toggle="data-password-toggle"]');
    
    toggleButtons.forEach(toggleButton => {
        // Locate the input field within the same parent container
        const passwordInput = toggleButton.closest('.form-icon-container').querySelector('[data-password-input="true"]');
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