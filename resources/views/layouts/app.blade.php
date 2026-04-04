<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Memory Tracker</title>
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <div class="logo">
        <a href="/trips">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
        </a>
    <h1>Travel Memory Tracker</h1>
    </div>
    <nav>
        <a href="/trips">All Trips</a>
        <a href="/trips/create">Create Trip</a>
        <a href="/">ADD LINK TO MEMORIES</a>
    </nav>
</header>

<main class="site-main">
    <div class="content-container">
        @yield('content')
    </div>
</main>

<footer class="site-footer">
    <div class="footer-container">

        <div class="footer-column">
            <h5>{{ config('app.name') }}</h5>
            <p>
                Your memories are one click away...
            </p>
            <p>
                Designed with Laravel & Blade.
            </p>
        </div>

        <div class="footer-column">
            <h6>Quick Links</h6>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h6>Contact</h6>
            <p>Email: info@example.com</p>
            <p>Phone: +353 00 000 0000</p>
        </div>

    </div>

    <div class="footer-bottom">
        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </div>
</footer>

</body>
</html>