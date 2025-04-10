@extends('layout.base')

@section('title', 'Register')

@section('heading', 'Register')

@section('content')
    @if (session('success'))
        <span style="color:green">{{ session('success') }}</span>
    @else
        <span style="color:red">{{ session('error') }}</span>
    @endif

    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">

            @error('name')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            @error('email')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            @error('password')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <button type="submit">Register</button>
        </div>
    </form>
@endsection