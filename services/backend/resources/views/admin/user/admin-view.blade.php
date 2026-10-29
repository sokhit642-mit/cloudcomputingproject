@extends('layouts.admin')
@section('title')
    Admins | View
@endsection
@section('content')


  
    <div class="row">
        <div class="col-xl-4 col-lg-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-6">
              <div class="card-body pt-12">
                <div class="user-avatar-section">
                  <div class=" d-flex align-items-center flex-column">
                    <img class="img-fluid rounded mb-4 border" src="{{ asset('uploads/adminprofile/' . $admin->image) }}" height="120" width="120" alt="User avatar">
                    <div class="user-info text-center">
                      <h5>{{ $admin->name }}</h5>
                        <span class="badge bg-label-secondary">
                            @if($admin->role == 0)
                                User
                            @elseif($admin->role == 1)
                                Admin  
                            @elseif($admin->role == 2)
                                Super Admin
                            @endif
                        </span>
                    </div>
                  </div>
                </div>
                {{-- <div class="d-flex justify-content-around flex-wrap my-6 gap-0 gap-md-3 gap-lg-4">
                  <div class="d-flex align-items-center me-5 gap-4">
                    <div class="avatar">
                      <div class="avatar-initial bg-label-primary rounded w-px-40 h-px-40">
                        <i class="bx bx-check bx-lg"></i>
                      </div>
                    </div>
                    <div>
                      <h5 class="mb-0">1.23k</h5>
                      <span>Task Done</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-4">
                    <div class="avatar">
                      <div class="avatar-initial bg-label-primary rounded w-px-40 h-px-40">
                        <i class="bx bx-customize bx-lg"></i>
                      </div>
                    </div>
                    <div>
                      <h5 class="mb-0">568</h5>
                      <span>Project Done</span>
                    </div>
                  </div>
                </div> --}}
                <h5 class="pb-4 border-bottom mb-4">Details</h5>
                <div class="info-container">
                  <ul class="list-unstyled mb-6">
                    <li class="mb-2">
                      <span class="h6">Username:</span>
                      <span>{{ $admin->name }}</span>
                    </li>
                    <li class="mb-2">
                      <span class="h6">Email:</span>
                      <span>{{ $admin->email }}</span>
                    </li>
                    <li class="mb-2">
                      <span class="h6">Status:</span>
                      <span>Active</span>
                    </li>
                    <li class="mb-2">
                      <span class="h6">Role:</span>
                      <span>
                        @if($admin->role == 0)
                            User
                        @elseif($admin->role == 1)
                            Admin  
                        @elseif($admin->role == 2)
                            Super Admin
                        @endif
                    </span>
                    </li>
                    {{-- <li class="mb-2">
                      <span class="h6">Tax id:</span>
                      <span>Tax-8965</span>
                    </li> --}}
                    {{-- <li class="mb-2">
                      <span class="h6">Contact:</span>
                      <span>(123) 456-7890</span>
                    </li> --}}
                    {{-- <li class="mb-2">
                      <span class="h6">Languages:</span>
                      <span>French</span>
                    </li> --}}
                    {{-- <li class="mb-2">
                      <span class="h6">Country:</span>
                      <span>England</span>
                    </li> --}}
                  </ul>
                  <div class="d-flex justify-content-center">
                    <a href="{{url('admin/admins')}}" class="btn btn-warning me-4">Back</a>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- /User Card -->
            <!-- Plan Card -->
            
            <!-- /Plan Card -->
        </div>
    </div>

   

  
@endsection