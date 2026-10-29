@extends('layouts.app')
@section('title','About Us')


@section('content')
    <div class="py-3 pyt-md-4">
        
        <div class="container border rounded-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="{{ asset('front-assets/homesport-logo.png') }}" alt="Success" class="img-fluid mt-2">
                        <br>
                        {{-- <h1 class="display-4 mt-4">@lang('front_alert.Thank you for Shopping')</h1> --}}
                        <p align="justify" style="font-size: 18.3px;text-align: justify;text-justify: inter-word;" class="fw-normal mt-3">
                            {{$appfrontdetail->abouthomesport ?? ''}}
                        </p>
                        {{-- <a href="{{ url('/all-products') }}" class="btn btn-primary fw-medium">@lang('front_alert.Continue Shopping')</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection