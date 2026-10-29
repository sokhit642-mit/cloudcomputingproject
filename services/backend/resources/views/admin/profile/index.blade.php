@extends('layouts.admin')
@section('title')
Profile
@endsection
@section('content')





    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-6">
                <div class="user-profile-header-banner">
                    <img src="{{asset('admin-das/img/profile/profile-banner.png')}}" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-8">
                    <div class="flex-shrink-0 mt-1 mx-sm-0 mx-auto" style="padding-left: 20px;padding-bottom: 20px;">
                        <img src="{{ asset('uploads/adminprofile/' . Auth::user()->image) }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-6 rounded-3 user-profile-img border">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-lg-5">
                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4 class="mb-2 mt-lg-7">{{ Auth::user()->name }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">
                                    <li class="list-inline-item">
                                        <i class="bx bx-crown mb-0"></i>
                                        <span class="fw-medium">
                                            @if(Auth::user()->role == 0)
                                                User
                                            @elseif(Auth::user()->role == 1) 
                                                Admin
                                            @elseif(Auth::user()->role == 2)
                                                Super Admin
                                            @endif
                                           
                                        </span>
                                    </li>
                                   
                                </ul>
                            </div>
                            {{-- <a href="javascript:void(0)" class="btn btn-primary mb-1">
                                <i class="bx bx-user-check bx-sm me-2"></i>Connected
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!--/ Header -->

    <!-- Navbar pills -->
    {{-- <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                class="bx bx-user bx-sm me-1_5"></i> Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages-profile-teams.html"><i
                                class="bx bx-group bx-sm me-1_5"></i> Teams</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages-profile-projects.html"><i
                                class="bx bx-grid-alt bx-sm me-1_5"></i> Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages-profile-connections.html"><i
                                class="bx bx-link bx-sm me-1_5"></i> Connections</a></li>
                </ul>
            </div>
        </div>
    </div> --}}
    <br>
    <!--/ Navbar pills -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-6">
                <div class="card-body">
                    <small class="card-text text-uppercase text-muted small">About</small>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-user"></i><span
                                class="fw-medium mx-2">Full Name:</span> <span>{{ Auth::user()->name }}</span></li>
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-envelope"></i><span
                            class="fw-medium mx-2">Email:</span> <span>{{ Auth::user()->email }}</span></li>
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-crown"></i><span
                            class="fw-medium mx-2">Role:</span> 
                            <span>
                                @if(Auth::user()->role == 0)
                                    User
                                @elseif(Auth::user()->role == 1)
                                    Admin  
                                @elseif(Auth::user()->role == 2)
                                    Super Admin
                                @endif
                            </span>
                        </li>
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-check"></i><span
                                class="fw-medium mx-2">Status:</span> <span class=" text-success">Active</span></li>
                        
                        {{-- <li class="d-flex align-items-center mb-4"><i class="bx bx-flag"></i><span
                                class="fw-medium mx-2">Country:</span> <span>USA</span></li> --}}
                        {{-- <li class="d-flex align-items-center mb-2"><i class="bx bx-detail"></i><span
                                class="fw-medium mx-2">Languages:</span> <span>English</span></li> --}}
                    </ul>
                    {{-- <small class="card-text text-uppercase text-muted small">Contacts</small>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-phone"></i><span
                                class="fw-medium mx-2">Contact:</span> <span>(123) 456-7890</span></li>
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-chat"></i><span
                                class="fw-medium mx-2">Skype:</span> <span>john.doe</span></li>
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-envelope"></i><span
                                class="fw-medium mx-2">Email:</span> <span>john.doe@example.com</span></li>
                    </ul> --}}
                    {{-- <small class="card-text text-uppercase text-muted small">Teams</small>
                    <ul class="list-unstyled mb-0 mt-3 pt-1">
                        <li class="d-flex flex-wrap mb-4"><span class="fw-medium me-2">Backend
                                Developer</span><span>(126 Members)</span></li>
                        <li class="d-flex flex-wrap">
                            <span class="fw-medium me-2">React Developer</span><span>(98 Members)</span>
                        </li>
                    </ul> --}}
                </div>
            </div>
            <!--/ About User -->
            <!-- Profile Overview -->
            {{-- <div class="card mb-6">
                <div class="card-body">
                    <small class="card-text text-uppercase text-muted small">Overview</small>
                    <ul class="list-unstyled mb-0 mt-3 pt-1">
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-check"></i><span
                                class="fw-medium mx-2">Task Compiled:</span> <span>13.5k</span></li>
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-star"></i><span
                                class="fw-medium mx-2">Projects Compiled:</span> <span>146</span></li>
                        <li class="d-flex align-items-center"><i class="bx bx-user"></i><span
                                class="fw-medium mx-2">Connections:</span> <span>897</span></li>
                    </ul>
                </div>
            </div> --}}
            <!--/ Profile Overview -->
        </div>
        @if (Session::has('message'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Set Toastr options
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

                    // Get the alert type and display the appropriate Toastr notification
                    let type = @json(Session::get('alert-type', 'success')); // Default to 'success'

                    switch(type){
                        case 'info':
                            toastr.info(@json(Session::get('message')));
                            break;

                        case 'warning':
                            toastr.warning(@json(Session::get('message')));
                            break;

                        case 'error':
                            toastr.error(@json(Session::get('message')));
                            break;

                        case 'success':
                            toastr.success(@json(Session::get('message')));
                            break;
                    }
                });
            </script>
        @endif
        <div class="col-xl-8 col-lg-5 col-md-5">
            <form action="{{ route('update.superadmin', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <small class="card-text text-uppercase text-muted small">Edit Profile</small>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Email</label>
                                <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        
                            
                            <div class="col-md-6">
                                <label for="" class="form-label">Password</label>
                                <input class="form-control" name="password" placeholder="Password" type="text" name="" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Confirm Password</label>
                                <input class="form-control" placeholder="Confirm Password" name="password_confirmation" type="text" name="" value="">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-2 d-flex flex-column align-items-center">
                            <!-- Image preview -->
                            <div class=" rounded-3" id="image-preview-container" style="cursor: pointer;">
                                <img id="image-preview" class="rounded-5 border" src="{{ asset('uploads/adminprofile/' . Auth::user()->image) }}" alt="Profile" style="max-width: 90%; height: auto;border-radius:8px;">
                            </div>
                            <!-- File input -->
                            <input type="file" id="image" class="form-control" name="image"  style="display: none;">
                            <p>image profile</p>

                        </div>
                       
                        
                    </div>
                </div>
                <div class="float-end mt-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        {{-- <div class="col-xl-8 col-lg-7 col-md-7">
            <!-- Activity Timeline -->
            <div class="card card-action mb-6">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0"><i
                            class="bx bx-bar-chart-alt-2 bx-lg text-body me-4"></i>Activity Timeline</h5>
                </div>
                <div class="card-body pt-3">
                    <ul class="timeline mb-0">
                        <li class="timeline-item timeline-item-transparent">
                            <span class="timeline-point timeline-point-primary"></span>
                            <div class="timeline-event">
                                <div class="timeline-header mb-3">
                                    <h6 class="mb-0">12 Invoices have been paid</h6>
                                    <small class="text-muted">12 min ago</small>
                                </div>
                                <p class="mb-2">
                                    Invoices have been paid to the company
                                </p>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="badge bg-lighter rounded d-flex align-items-center">
                                        <img src="../../assets//img/icons/misc/pdf.png" alt="img" width="15"
                                            class="me-2">
                                        <span class="h6 mb-0 text-body">invoices.pdf</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent">
                            <span class="timeline-point timeline-point-success"></span>
                            <div class="timeline-event">
                                <div class="timeline-header mb-3">
                                    <h6 class="mb-0">Client Meeting</h6>
                                    <small class="text-muted">45 min ago</small>
                                </div>
                                <p class="mb-2">
                                    Project meeting with john @10:15am
                                </p>
                                <div class="d-flex justify-content-between flex-wrap gap-2 mb-2">
                                    <div class="d-flex flex-wrap align-items-center mb-50">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="../../assets/img/avatars/1.png" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <p class="mb-0 small fw-medium">Lester McCarthy (Client)</p>
                                            <small>CEO of ThemeSelection</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent">
                            <span class="timeline-point timeline-point-info"></span>
                            <div class="timeline-event">
                                <div class="timeline-header mb-3">
                                    <h6 class="mb-0">Create a new project for client</h6>
                                    <small class="text-muted">2 Day Ago</small>
                                </div>
                                <p class="mb-2">
                                    6 team members in a project
                                </p>
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <ul
                                                class="list-unstyled users-list d-flex align-items-center avatar-group m-0 me-2">
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top" class="avatar pull-up"
                                                    aria-label="Vinnie Mostowy" data-bs-original-title="Vinnie Mostowy">
                                                    <img class="rounded-circle" src="../../assets/img/avatars/1.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top" class="avatar pull-up"
                                                    aria-label="Allen Rieske" data-bs-original-title="Allen Rieske">
                                                    <img class="rounded-circle" src="../../assets/img/avatars/4.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top" class="avatar pull-up"
                                                    aria-label="Julee Rossignol"
                                                    data-bs-original-title="Julee Rossignol">
                                                    <img class="rounded-circle" src="../../assets/img/avatars/2.png"
                                                        alt="Avatar">
                                                </li>
                                                <li class="avatar">
                                                    <span class="avatar-initial rounded-circle pull-up text-heading"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        data-bs-original-title="3 more">+3</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ Activity Timeline -->
            <div class="row">
                <!-- Connections -->
                <div class="col-lg-12 col-xl-6">
                    <div class="card card-action mb-6">
                        <div class="card-header align-items-center">
                            <h5 class="card-action-title mb-0">Connections</h5>
                            <div class="card-action-element">
                                <div class="dropdown">
                                    <button type="button"
                                        class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow p-0 text-muted"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="bx bx-dots-vertical-rounded bx-md text-muted"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="javascript:void(0);">Share connections</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <img src="../../assets/img/avatars/2.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="me-2">
                                                <h6 class="mb-0">Cecilia Payne</h6>
                                                <small>45 Connections</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button class="btn btn-label-primary btn-icon"><i
                                                    class="bx bx-user-check bx-md"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <img src="../../assets/img/avatars/3.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="me-2">
                                                <h6 class="mb-0">Curtis Fletcher</h6>
                                                <small>1.32k Connections</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button class="btn btn-primary btn-icon"><i
                                                    class="bx bx-user-x bx-md"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <img src="../../assets/img/avatars/10.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="me-2">
                                                <h6 class="mb-0">Alice Stone</h6>
                                                <small>125 Connections</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button class="btn btn-primary btn-icon"><i
                                                    class="bx bx-user-x bx-md"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <img src="../../assets/img/avatars/7.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="me-2">
                                                <h6 class="mb-0">Darrell Barnes</h6>
                                                <small>456 Connections</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button class="btn btn-label-primary btn-icon"><i
                                                    class="bx bx-user-check bx-md"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-6">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <img src="../../assets/img/avatars/12.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="me-2">
                                                <h6 class="mb-0">Eugenia Moore</h6>
                                                <small>1.2k Connections</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button class="btn btn-label-primary btn-icon"><i
                                                    class="bx bx-user-check bx-md"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="text-center">
                                    <a href="javascript:;">View all connections</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ Connections -->
                <!-- Teams -->
                <div class="col-lg-12 col-xl-6">
                    <div class="card card-action mb-6">
                        <div class="card-header align-items-center">
                            <h5 class="card-action-title mb-0">Teams</h5>
                            <div class="card-action-element">
                                <div class="dropdown">
                                    <button type="button"
                                        class="btn btn-icon btn-text-secondary dropdown-toggle hide-arrow p-0"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="bx bx-dots-vertical-rounded bx-md text-muted"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="javascript:void(0);">Share teams</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <img src="../../assets/img/icons/brands/react-label.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="me-2">
                                                <h6 class="mb-0">React Developers</h6>
                                                <small>72 Members</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:;"><span
                                                    class="badge bg-label-danger">Developer</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <img src="../../assets/img/icons/brands/support-label.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="me-2">
                                                <h6 class="mb-0">Support Team</h6>
                                                <small>122 Members</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:;"><span
                                                    class="badge bg-label-primary">Support</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <img src="../../assets/img/icons/brands/figma-label.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="me-2">
                                                <h6 class="mb-0">UI Designers</h6>
                                                <small>7 Members</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:;"><span class="badge bg-label-info">Designer</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <img src="../../assets/img/icons/brands/vue-label.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="me-2">
                                                <h6 class="mb-0">Vue.js Developers</h6>
                                                <small>289 Members</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:;"><span
                                                    class="badge bg-label-danger">Developer</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-6">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <img src="../../assets/img/icons/brands/twitter-label.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="me-w">
                                                <h6 class="mb-0">Digital Marketing</h6>
                                                <small>24 Members</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:;"><span
                                                    class="badge bg-label-secondary">Marketing</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="text-center">
                                    <a href="javascript:;">View all teams</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ Teams -->
            </div>
            <!-- Projects table -->
            <div class="card mb-6">
                <h5 class="card-header pb-0 text-sm-start text-center">Projects List</h5>
                <div class="table-responsive mb-4">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="d-flex justify-content-between align-items-center flex-column flex-sm-row mx-6 row">
                            <div
                                class="col-sm-4 col-12 d-flex align-items-center justify-content-sm-start justify-content-center">
                                <div class="dataTables_length" id="DataTables_Table_0_length"><label><select
                                            name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                            class="form-select">
                                            <option value="7">7</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select></label></div>
                            </div>
                            <div
                                class="col-sm-8 col-12 d-flex align-items-center justify-content-sm-end justify-content-center mt-sm-0 mt-n6">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input
                                            type="search" class="form-control" placeholder="Search Project"
                                            aria-controls="DataTables_Table_0"></label></div>
                            </div>
                        </div>
                        <table class="table datatable-project dataTable no-footer dtr-column" id="DataTables_Table_0"
                            aria-describedby="DataTables_Table_0_info">
                            <thead class="border-top">
                                <tr>
                                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                        style="width: 8.95px; display: none;" aria-label=""></th>
                                    <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                        colspan="1" style="width: 8.95px;" data-col="1" aria-label=""><input
                                            type="checkbox" class="form-check-input"></th>
                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1" style="width: 80.975px;" aria-sort="descending"
                                        aria-label="Project: activate to sort column ascending">Project</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 74.2px;"
                                        aria-label="Leader: activate to sort column ascending">Leader</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 54.925px;"
                                        aria-label="Team">Team</th>
                                    <th class="w-px-200 sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1" style="width: 200px;"
                                        aria-label="Progress: activate to sort column ascending">Progress</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 70.125px;"
                                        aria-label="Action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd">
                                    <td valign="top" colspan="6" class="dataTables_empty">Loading...</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between mx-6 row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                    aria-live="polite">Showing 0 to 0 of 0 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0"
                                                aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1"
                                                class="page-link"><i class="bx bx-chevron-left bx-18px"></i></a></li>
                                        <li class="paginate_button page-item next disabled"
                                            id="DataTables_Table_0_next"><a aria-controls="DataTables_Table_0"
                                                aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1"
                                                class="page-link"><i class="bx bx-chevron-right bx-18px"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Projects table -->
        </div> --}}
    </div>
    <!--/ User Profile Content -->




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