@extends('layouts.app')
@section('title')
    {{-- {{ $category->name }} --}}products
@endsection
@section('description')
    {{-- {{ $category->description }} --}}
@endsection
@section('content')

    <livewire:fronted.products.all-products :category="$category" />
    {{-- <h4>Hello all products</h4> --}}

@endsection