<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Name</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your app-specific CSS file -->
    <!-- Include any additional styles or CDN links here -->
</head>
<body>
<header>
    <nav class="navbar">
        <a href="{{ url('/') }}">Home</a>
        @if(Auth::check())
            <a href="{{ route('tasks.index') }}">My Tasks</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endif
    </nav>
</header>

<div class="container">
    @yield('content')
</div>

<footer>
    &copy; {{ date('Y') }} ToDo App :). All rights reserved.
</footer>

<script src="{{ asset('js/app.js') }}"></script> <!-- Include your app-specific JavaScript file -->
<!-- Include any additional scripts or CDN links here -->
</body>
</html>
