<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Travel Memory Tracker') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="marketing-shell">
            <header class="site-header">
                <div class="header-inner">
                    <a href="{{ route('home') }}" class="brand">
                        <x-application-logo style="height: 34px; width: 34px;" />
                        Travel Memory Tracker
                    </a>

                    <nav class="main-nav marketing-nav" aria-label="Homepage">
                        <a href="#features" class="nav-link">Features</a>
                        <a href="#how" class="nav-link">How it works</a>
                        <a href="#demo" class="nav-link">Demo</a>
                    </nav>

                    <div class="user-actions">
                        @auth
                            <a href="{{ route('dashboard') }}" class="button">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="button button-secondary">Log in</a>
                            <a href="{{ route('register') }}" class="button">Create account</a>
                        @endauth
                    </div>
                </div>
            </header>

            <main>
                @yield('content')
            </main>

            <footer class="marketing-footer">
                <div class="marketing-footer-inner">
                    <p class="marketing-footer-title">Travel Memory Tracker</p>
                    <p class="marketing-footer-copy">Organise trips, revisit moments.</p>
                    <p class="marketing-footer-meta">&copy; {{ date('Y') }} Educational project.</p>
                </div>
            </footer>
        </div>
    </body>
</html>
