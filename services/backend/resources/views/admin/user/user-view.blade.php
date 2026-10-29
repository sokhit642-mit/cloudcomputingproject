@extends('layouts.admin')
@section('title')
Users | View
@endsection
@section('content')



<div class="row">
  <div class="col-xl-4 col-lg-5 order-1 order-md-0">
    <!-- User Card -->
    <div class="card mb-6">
      <div class="card-body pt-12">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">

            @if($user->avatar)
            <!-- If logged in with Google or Facebook, show the avatar -->
            <img class="img-fluid rounded mb-4 border" src="{{ $user->avatar }}" alt="{{ $user->name }}'s Avatar" />
            @elseif($user->image)
            <!-- If registered normally and has an uploaded image -->
            <img class="img-fluid rounded mb-4 border" src="{{ asset('uploads/profile/' . $user->image) }}"
              alt="{{ $user->name }}" class="profile-image">
            @else
            <!-- Default image if no avatar or uploaded image -->
            <img class="img-fluid rounded mb-4 border" src="{{ asset('uploads/profile/default.png') }}"
              alt="Default Avatar" class="profile-image">
            @endif

            {{-- <img class="img-fluid rounded mb-4 border" src="{{ asset('uploads/adminprofile/' . $user->image) }}"
              height="120" width="120" alt="User avatar"> --}}
            <div class="user-info text-center">
              <h5>{{ $user->name }}</h5>
              <span class="badge bg-label-secondary">
                @if($user->role == 0)
                User
                @elseif($user->role == 1)
                Admin
                @elseif($user->role == 2)
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
        <h5 class="pb-4 border-bottom mb-4"></h5>
        <div class="info-container">
          <ul class="list-unstyled mb-6">
            <li class="mb-2">
              <span class="h6">Username:</span>
              <span>{{ $user->name }}</span>
            </li>
            <li class="mb-2">
              <span class="h6">Email:</span>
              <span>{{ $user->email }}</span>
            </li>
            {{-- <li class="mb-2">
              <span class="h6">Status:</span>
              <span>
                @if($user->is_active)
                <span class="badge bg-success">Active</span>
                @else
                <span class="badge bg-danger">Inactive</span>
                @endif
              </span>
            </li> --}}
            <li class="mb-2">
              <span class="h6">Role:</span>
              <span>
                @if($user->role == 0)
                User
                @elseif($user->role == 1)
                Admin
                @elseif($user->role == 2)
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
            <a href="{{url('admin/user')}}" class="btn btn-warning me-4">Back</a>

          </div>
        </div>
      </div>
    </div>
    <!-- /User Card -->
    <!-- Plan Card -->

    <!-- /Plan Card -->
  </div>
  <div class="col-xl-8 col-lg-7 order-0 order-md-1">
    <!-- User Pills -->

    <!--/ User Pills -->

    <!-- Project table -->
    <div class="card mb-6">
      <h5 class="card-header pb-0 text-sm-start text-center mb-4">Order History</h5>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              {{-- <th scope="col">Order ID</th> --}}
              <th scope="col">Products</th>
              <th scope="col">Qty</th>
              <th scope="col">Status</th>

            </tr>
          </thead>
          <tbody>
            @php $count = 1; @endphp
            @foreach ($user->orders as $order)
            @foreach ($order->orderItems as $item)
            <tr>
              <th scope="row">{{ $count }}</th>
              {{-- <td>{{ $order->id }}</td> --}}
              <td>
                @if ($item->product->productImages && count($item->product->productImages) > 0)
                <img src="{{ asset($item->product->productImages[0]->image) }}" alt="{{ $item->product->name }}"
                  width="53" class="rounded-3 border">
                @else
                <!-- Fallback image if no product image is found -->
                <img src="{{ asset('path/to/default-image.png') }}" alt="No image" width="53" class="rounded-3">
                @endif
                {{ $item->product->name }}
              </td>
              <td>{{ $item->quantity }}</td>
              <td>
                @if ($order->status_message)
                @php
                $statusClass = '';
                switch ($order->status_message) {
                case 'in-progress':
                $statusClass = 'bg-label-warning'; // yellow color for in-progress
                break;
                case 'completed':
                $statusClass = 'bg-label-success'; // green color for completed
                break;
                case 'pending':
                $statusClass = 'bg-label-info'; // blue color for pending
                break;
                case 'out-for-delivery':
                $statusClass = 'bg-label-primary'; // primary color for out-for-delivery
                break;
                default:
                $statusClass = 'bg-label-secondary'; // grey color for unknown status
                break;
                }
                @endphp
                @else
                @php $statusClass = 'bg-light'; @endphp
                <!-- Light background if no status -->
                @endif

                <div class="badge px-2 {{ $statusClass }}">
                  {{ $order->status_message ?? 'No Status Available' }}
                </div>
              </td>

            </tr>
            @php $count++; @endphp
            @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
    </div>


  </div>
</div>




@endsection