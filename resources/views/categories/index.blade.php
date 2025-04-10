@extends('layout.base')

@section('title', 'Category')

@section('heading', 'Category')

@section('content')
    @if (session('success'))
        <span style="color:green">{{ session('success') }}</span>
    @else
    <span style="color:red">{{ session('error') }}</span>
    @endif

    <a href="{{ route('categories.create') }}">Create Category</a>

    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($categories as $index => $category)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <button><a href="{{ route('categories.edit', $category->id) }}">Edit</a></button>
                    |
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    
    {{ $categories->links() }}
@endsection