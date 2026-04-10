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
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const burger = document.getElementById('hamburger');
                const actions = document.getElementById('userActions');

                burger.addEventListener('click', function () {
                    actions.classList.toggle('active');
                });
            });
        </script>
    </head>
    <body>
        <div class="app-shell">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header>
                    <div class="page-header">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>

        <div class="lightbox" data-global-lightbox hidden aria-hidden="true">
            <div class="lightbox-dialog" role="dialog" aria-label="Photo viewer">
                <div class="lightbox-toolbar">
                    <span class="lightbox-counter" data-lightbox-counter></span>
                    <button type="button" class="button button-secondary" data-lightbox-close>Close</button>
                </div>
                <div class="lightbox-stage">
                    <button type="button" class="lightbox-nav" data-lightbox-prev aria-label="Previous photo">‹</button>
                    <img class="lightbox-image" data-lightbox-image alt="">
                    <button type="button" class="lightbox-nav" data-lightbox-next aria-label="Next photo">›</button>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/lightbox.js') }}" defer></script>
        @stack('scripts')
    </body>
</html>
