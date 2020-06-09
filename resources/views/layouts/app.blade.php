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
<body style="overflow: hidden;">

<section>
    <x-navbar></x-navbar>
</section>
<section>
    <main class="main-fondo">
        @yield('content')
    </main>
</section>
@include("layouts.js")
@yield("js")



</body>
</html>