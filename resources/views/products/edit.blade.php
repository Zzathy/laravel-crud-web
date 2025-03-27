@extends('layout.base')

@section('title', 'Edit Product')

@section('heading', 'Edit Product')

@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" class="@error('name')
                is-invalid
            @enderror">

            @error('name')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="@error('description')
                is-invalid
            @enderror">{{ $product->description }}</textarea>

            @error('description')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="{{ $product->price }}" class="@error('price')
                is-invalid
            @enderror">

            @error('price')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <button type="submit">Edit</button>
        </div>
    </form>
@endsection