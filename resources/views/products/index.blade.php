@extends('layout.base')

@section('title', 'Product')

@section('heading', 'Product')

@section('content')
    @if (session('success'))
        <span style="color:green">{{ session('success') }}</span>
    @else
        <span style="color:red">{{ session('error') }}</span>
    @endif

    <a href="{{ route('products.create') }}">Create Product</a>

    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="{{ asset('storage/images/' . $product->image) }}" alt="Image" width="250"></td>
                <td>
                    <button><a href="{{ route('products.edit', $product->id) }}">Edit</a></button>
                    |
                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $products->links() }}
@endsection