<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @include("layouts.css")

    </head>
    <body>
        <div>
            <x-navbar></x-navbar>

            <main class="main-fondo">
                @yield('content')
            </main>
        </div>
        @include("layouts.js")
        @yield("js")
    </body>
</html>
