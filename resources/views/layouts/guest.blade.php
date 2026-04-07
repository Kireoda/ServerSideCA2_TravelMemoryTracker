<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="auth-page">
            <div class="auth-card">
                <a href="/" class="brand">
                    <x-application-logo style="height: 40px; width: 40px;" />
                    Travel Memory Tracker
                </a>
                <div style="margin-top: 20px;">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
