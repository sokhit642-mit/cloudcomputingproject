@extends('layouts.app')
@section('title')
    {{-- {{ $category->name }} --}}New Arrivals
@endsection
@section('description')
    {{-- {{ $category->description }} --}}
@endsection
@section('content')

    <livewire:fronted.products.new-arrval />
    {{-- <h4>Hello all products</h4> --}}

@endsection