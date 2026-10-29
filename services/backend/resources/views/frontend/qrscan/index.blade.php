@extends('layouts.app')
@section('title','KHQR')

@section('content')


    Hello
    <div class="container">
        <h4>
            Overall Total After Discounts: ${{ number_format($cart->sum('total_after_discount'), 2) }}
        </h4>
    </div>

  

@endsection
