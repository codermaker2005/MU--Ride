<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MU Ride</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header class="navbar">
    <a href="{{ route('home') }}" class="brand">
        <div class="logo">MU</div>
        <div>
            <strong>MU Ride</strong><br>
            <small style="color:var(--text-muted)">Student Carpool</small>
        </div>
    </a>

    <nav class="nav-links">
        <a href="{{ route('home') }}">Home</a>

        @auth
            @if(auth()->user()->role === 'student')
                <a href="{{ route('student.dashboard') }}">Dashboard</a>
            @endif

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">Admin</a>
            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn-primary">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>
</header>

<div class="container">
    @yield('content')
</div>

</body>
</html>
