@extends('layout.base_auth')

@section('title', 'Login')

@section('heading', 'Login')

@section('content')
    @if (session('success'))
        <span style="color:green">{{ session('success') }}</span>
    @else
        <span style="color:red">{{ session('error') }}</span>
    @endif

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">

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
            <button type="submit">Login</button>
        </div>
    </form>
@endsection