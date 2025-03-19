@extends('layout.base')

@section('title', 'Edit Category')

@section('heading', 'Edit Category')

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">
        <button type="submit">Create</button>
    </form>
@endsection