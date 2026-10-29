@extends('layouts.admin')
@section('title')
    Product | Create
@endsection
@section('content')


<livewire:admin.products.create :categories="$categories" :brands="$brands" />

  

  
@endsection