@extends('layouts.app')
@section('title','Edit Profile')

@section('content')


<div class="container">
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item fw-normal"><a href="#!">@lang('wishlist.home')</a></li>
          <li class="breadcrumb-item fw-normal"><a href="#!">@lang('profile.profile')</a></li>
          <li class="breadcrumb-item fw-normal"><a href="#!">@lang('profile.edit')</a></li>
          
        </ol>
    </nav>
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
                      <p class="mb-0">@lang('profile.total_order'): {{$userOrderCount}}</p>
                      {{-- <a class="fw-bold" href="#!">{{$userOrderCount}}</a> --}}
                      
                    </div>
                  </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex align-items-center  mb-5 justify-content-between">
                    <h5>@lang('profile.about') {{ Auth::user()->name }}</h5>
                    @if (Auth::user()->google_id || Auth::user()->facebook_id)
                                
                    @else
                        <a class="btn btn-subtle-primary btn-sm px-3" href="{{url('/edit-password')}}">@lang('profile.editpass')</a>
                    @endif

                    {{-- <a class="btn btn-subtle-primary btn-sm px-3" href="{{url('edit-profile')}}">@lang('profile.edit')</a> --}}
                  </div>
                  <div class="mb-4">
                    <div class="d-flex align-items-center mb-1"><i class="uil uil-envelope-minus me-2"></i>
                      <h5 class="text-body-highlight mb-0">@lang('profile.email')</h5>
                    </div><a href="mailto:shatinon@jeemail.com:">{{ Auth::user()->email }}</a>
                  </div>
                  <div class="mb-4">
                    <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-phone"> </span>
                      <h5 class="text-body-highlight mb-0">@lang('profile.phone')</h5>
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
                      <h5 class="mb-0">@lang('profile.address')</h5>
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
            {{-- <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        @if(Auth::check())
                            @if(Auth::user()->avatar)
                            <!-- If logged in with Google or Facebook, show the avatar -->
                            <img class="rounded-4" style="width: 150px;" src="{{ Auth::user()->avatar }}"
                                alt="{{ Auth::user()->name }}'s Avatar" />
                            @elseif(Auth::user()->image)
                            <!-- If registered normally and has an uploaded image -->
                            <img class="rounded-circle" style="width: 150px;"
                                src="{{ asset('uploads/profile/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}"
                                class="profile-image">
                            @else
                            <!-- Default image if no avatar or uploaded image -->
                            <img class="rounded-4" style="width: 150px;" src="{{ asset('uploads/profile/default.png') }}"
                                alt="Default Avatar" class="profile-image">
                            @endif
                        @endif
                       
                        

                        <table class="table border-top mt-3">
                            <tr>
                                <td class=" fs-9">Name :</td>
                                <td class="text-start fs-9">
                                    {{ Auth::user()->name }}
                                </td>
                            </tr>
                            <tr>
                                <td class=" fs-9">Email :</td>
                                <td class="text-start fs-9">
                                    {{ Auth::user()->email }}
                                </td>
                            </tr>
                            <tr>
                                <td class=" fs-9">Phone :</td>
                                <td class="text-start fs-9">
                                    {{ Auth::user()->phone }}
                                </td>
                            </tr>
                            <tr>
                                <td class=" fs-9">Address:</td>
                                <td class="text-start fs-9">
                                    {{ Auth::user()->address }}
                                </td>
                            </tr>
                        </table>
                        <a href="{{url('edit-profile')}}" class="btn btn-primary">Edit profile</a>
                    </div>


                </div>
            </div> --}}
        </div>
        
        <div class="col-md-8">
            <form method="POST" action="{{ route('userprofile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-header fw-bold">@lang('profile.Update Your Profile information')</div>
                    {{-- <h5 class="card-header pb-0 text-sm-start text-center mb-4">Order History</h5> --}}
                    <div class="card-body">
                        @if (Auth::user()->google_id || Auth::user()->facebook_id)
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fs-9">@lang('profile.name')</label>
                                    <input type="text" class="form-control" placeholder="@lang('profile.name')" id="name" name="name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fs-9">@lang('profile.email')</label>
                                    <input type="email" class="form-control" placeholder="@lang('profile.email')" id="email" name="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label fs-9">@lang('profile.phone')</label>
                                    <input type="text" class="form-control" placeholder="@lang('profile.phone')" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="address" class="form-label fs-9">@lang('profile.address')</label>
                                    <textarea class="form-control" placeholder="@lang('profile.address')" name="address" id="address" cols="10" rows="5">{{ Auth::user()->address }}</textarea>
                                </div>
                               
                            </div>

                            
                        @else
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label for="name" class="form-label">@lang('profile.name')</label>
                                <input type="text" class="form-control" placeholder="@lang('profile.name')" id="name" name="name" value="{{ Auth::user()->name }}" required>
                            </div>
                        
                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">@lang('profile.email')</label>
                                <input type="email" class="form-control" placeholder="@lang('profile.email')" id="email" name="email" value="{{ Auth::user()->email }}" required>
                            </div>
                        
                            <!-- Phone -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label">@lang('profile.phone')</label>
                                <input type="text"  placeholder="@lang('profile.phone')" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                            </div>
                        
                            <!-- Address -->
                            <div class="col-md-12">
                                <label for="address" class="form-label">@lang('profile.address')</label>
                                <textarea class="form-control" placeholder="@lang('profile.address')" name="address" id="address" cols="10" rows="5">{{ Auth::user()->address }}</textarea>
                            </div>
                        
                            <hr class="mt-2">
                        
                            <!-- Profile Image -->
                            <div class="col-md-6 text-center">
                                <img id="image-preview" src="{{ asset('uploads/profile/' . Auth::user()->image) }}" alt="Image Preview" class="img-thumbnail mb-2" style="width: 150px;">

                                {{-- <label for="image" class="form-label">Profile Image</label> --}}
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                                {{-- <small class="text-muted">Max file size: 2MB</small> --}}
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="image-preview" class="form-label">Image Preview</label>
                            </div> --}}
                        
                           
                        
                            <!-- Password Fields -->
                            {{-- <div class="col-md-6">
                                <label for="old-password" class="form-label">Old Password</label>
                                <input type="password" class="form-control" placeholder="Old Password" id="old-password" name="old-password">
                                @error('old-password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="new-password" class="form-label">New Password</label>
                                <input type="password" class="form-control" placeholder="New Password" id="new-password" name="new-password">
                                @error('new-password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                        
                            </div>
                            <div class="col-md-12 mt-2">
                                <a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
                            </div> --}}
                        
                            {{-- <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div> --}}
                        </div>
                        @endif
                            
                            
                        
                    </div>
                </div>
                <div class="mt-2 d-flex float-end gap-2">
                    <a href="{{url('/profile')}}" class="btn btn-warning fw-medium">@lang('profile.back')</a>
                    <button type="submit" class="btn btn-primary fw-medium">@lang('profile.update')</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

@push('scripts')
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