@extends('layouts.app')
@section('title')
    {{ $brand->name }}
@endsection
@section('description')
    {{-- {{ $category->description }} --}}
@endsection
@section('content')

<livewire:fronted.products.products-bybrand :products="$products" :brand="$brand">

@endsection