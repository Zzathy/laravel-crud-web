@extends('layout.base')

@section('title', 'Index')

@section('heading', 'Index')

@section('content')
    <a href="{{ route('categories.index') }}">Category</a>
    <span>|</span>
    <a href="{{ route('products.index') }}">Product</a>
@endsection