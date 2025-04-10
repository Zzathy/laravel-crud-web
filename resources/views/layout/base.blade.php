<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD WEB | @yield('title')</title>
</head>
<body>
    <p>User: {{ Auth::user()->name }}</p>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <h1>@yield('heading')</h1>
    
    @yield('content')
</body>
</html>