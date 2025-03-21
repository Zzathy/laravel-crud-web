@extends('layout.base')

@section('title', 'Edit Category')

@section('heading', 'Edit Category')

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" class="@error('name')
                is-invalid
            @enderror">

            @error('name')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <button type="submit">Edit</button>
        </div>
    </form>
@endsection