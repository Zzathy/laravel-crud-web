<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD WEB | @yield('title')</title>
</head>
<body>
    <a href="{{ route('login') }}">Login</a>
    <span>|</span>
    <a href="{{ route('register') }}">Register</a>
    <h1>@yield('heading')</h1>
    
    @yield('content')
</body>
</html>