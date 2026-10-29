@extends('layouts.app')
@section('title','All Brands')


@section('content')

<livewire:fronted.brand.index :brand="$brand" />

@endsection