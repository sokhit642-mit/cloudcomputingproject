@extends('layouts.app')
@section('title')
    {{ $product->category->name }}
@endsection
@section('description')
    {{ $category->description }}
@endsection
@section('content')
    <div>
        <livewire:fronted.products.view :category="$category" :product="$product">
    </div>
@endsection