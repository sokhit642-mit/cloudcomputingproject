@extends('layouts.app')
@section('title','Profile')

@section('content')


<div class="container">
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item fw-normal"><a href="#!">@lang('wishlist.home')</a></li>
          <li class="breadcrumb-item fw-normal"><a href="#!">@lang('profile.profile')</a></li>
          
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
                    <h5>@lang('profile.about') {{ Auth::user()->name }}</h5><a class="btn btn-subtle-primary btn-sm px-3" href="{{url('edit-profile')}}">@lang('profile.edit')</a>
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
            <div class="">
                {{-- <div class="card-header fw-bold">Your Orders</div> --}}
            {{-- <h5 class="card-header pb-0 text-sm-start text-center mb-4">Order History</h5> --}}
                <div class="card-body">
                    <div class="border-y border-translucent">
                        <div class="table-responsive scrollbar">
                            <table class="table fs-9 mb-0">
                                <thead>
                                    <tr>
                                        <th class="sort white-space-nowrap text-center align-middle" scope="col">@lang('order.orderid')</th>
                                        <th class="sort white-space-nowrap align-middle" scope="col" data-sort="products">@lang('order.tracking_no')</th>
                                        {{-- <th class="sort white-space-nowrap align-middle" scope="col" data-sort="products">Full Name --}}
                                        </th>
                                        {{-- <th class="sort align-middle desc" scope="col" data-sort="color">Payment Mode</th> --}}
                                        <th class="sort align-middle desc" scope="col" data-sort="color">@lang('order.order_date')</th>
                                        <th class="sort align-middle desc" scope="col" data-sort="color">@lang('order.status_message')</th>
                                        <th class="sort align-middle text-center pe-0" scope="col">@lang('order.action')</th>
                                    </tr>
                                </thead>
            
            
                                <tbody class="list" id="profile-wishlist-table-body">
                                    @forelse ($orders as $order)
                                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                        <td class="text-center align-middle">{{$order->id}}</td>
                                        <td class="align-middle">{{$order->tracking_no}}</td>
                                        {{-- <td class="align-middle">{{$order->fullname}}</td> --}}
                                        {{-- <td class="align-middle">{{$order->payment_mode}}</td> --}}
                                        <td class="align-middle">{{$order->created_at->format('d-m-Y')}}</td>
                                        <td class="align-middle">
                                            @if ($order->status_message)
                                                @php
                                                    $statusClass = '';
                                                    switch ($order->status_message) {
                                                        case 'in-progress':
                                                            $statusClass = 'badge-phoenix-warning'; // yellow color for in-progress
                                                            break;
                                                        case 'completed':
                                                            $statusClass = 'badge-phoenix-success'; // green color for completed
                                                            break;
                                                        case 'pending':
                                                            $statusClass = 'badge-phoenix-info'; // blue color for pending
                                                            break;
                                                        case 'out-for-delivery':
                                                            $statusClass = 'badge-phoenix-primary'; // primary color for out-for-delivery
                                                            break;
                                                        default:
                                                            $statusClass = 'badge-phoenix-secondary'; // grey color for unknown status
                                                            break;
                                                    }
                                                @endphp
                                            @else
                                                @php $statusClass = 'bg-light'; @endphp <!-- Light background if no status -->
                                            @endif
                                            <div class="badge badge-phoenix px-2 {{ $statusClass }}">
                                                {{ $order->status_message ?? 'No Status Available' }}
                                            </div>
                                            {{-- {{$order->status_message}} --}}
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ url('orders/'.$order->id) }}"
                                                class="btn btn-primary fw-normal btn-sm">@lang('order.view')</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="7" style="color: rgb(255, 0, 0);">@lang('order.no_items')</td>
                                    </tr>
                                    @endforelse
                                </tbody>
            
            
            
                            </table>
                            <div class="mt-2 float-end">
                                {{$orders->links()}}
                            </div>
                        </div>
            
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>



@endsection