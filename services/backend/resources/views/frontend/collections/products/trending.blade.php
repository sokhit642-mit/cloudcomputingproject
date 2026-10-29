@extends('layouts.app')
@section('title')
    {{-- {{ $category->name }} --}}Trending
@endsection
@section('description')
    {{-- {{ $category->description }} --}}
@endsection
@section('content')

    <livewire:fronted.products.trending />
    {{-- <h4>Hello all products</h4> --}}

@endsection