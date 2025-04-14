@extends('layout.base')

@section('title', 'Create Category')

@section('heading', 'Create Category')

@section('content')
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
    
            @error('name')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <button type="submit">Create</button>
        </div>

    </form>
@endsection