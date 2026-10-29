@extends('layouts.app')
@section('title')
    {{ $category->name }}
@endsection
@section('description')
    {{ $category->description }}
@endsection
@section('content')

    <livewire:fronted.products.index :category="$category" />

@endsection