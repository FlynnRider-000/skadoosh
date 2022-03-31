<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        {{-- <link rel="manifest" href="{{ asset('site.webmanifest') }}"> --}}
        {{-- <link rel="preload" href="{{ asset('assets/fonts/HappyKids.woff2') }}" as="font" type="font/woff2" crossorigin> --}}
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

        @include('layouts.frontend.stylelib')
        @include('layouts.frontend.jslib')
        <link rel="stylesheet" href="{{ asset('assets/css/frontend.app.css') }}">
    </head>
    <body>
        <div class="overlaynew">
            <!-- Preloader End -->
            @include('layouts.frontend.header')

            <main>
                @yield('content')
            </main>

            @include('layouts.frontend.footer')
        </div>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
        @if (session('verified'))
            <script src="{{ URL::asset('/assets/js/verification-email.js') }}"></script>
        @endif
        <script src="{{ URL::asset('/assets/js/verification.success.js') }}"></script>
    </body>
</html>
