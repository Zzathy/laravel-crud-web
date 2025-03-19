@extends('layout.base')

@section('title', 'Create Category')

@section('heading', 'Create Category')

@section('content')
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <button type="submit">Create</button>
    </form>
@endsection