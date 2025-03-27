@extends('layout.base')

@section('title', 'Create Product')

@section('heading', 'Create Product')

@section('content')
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="@error('name')
                is-invalid
            @enderror">

            @error('name')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="@error('description')
                is-invalid
            @enderror"></textarea>

            @error('description')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="@error('price')
                is-invalid
            @enderror">

            @error('price')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <button type="submit">Create</button>
        </div>

    </form>
@endsection