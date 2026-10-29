@extends('layouts.app')
@section('title','Thank you for Shopping')

@section('content')

    {{-- <livewire:fronted.wishlist-show /> --}}
    <div class="py-3 pyt-md-4">
       
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="{{ asset('front-assets/homesport-logo.png') }}" alt="Success" class="img-fluid">
                        <h1 class="display-4 mt-4">@lang('front_alert.Thank you for Shopping')</h1>
                        <p class="lead fw-medium">@lang('front_alert.Your order has been processed successfully')</p>
                        <a href="{{ url('/all-products') }}" class="btn btn-primary fw-medium">@lang('front_alert.Continue Shopping')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection