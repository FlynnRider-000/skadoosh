<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="JOb Finder" name="description" />
        <meta content="MMC Agency" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('admin_assets/images/favicon.ico')}}">
        @include('layouts.backend.head-css')
  </head>

    @yield('body')
    
    @yield('content')

    @include('layouts.backend.vendor-scripts')
    </body>
</html>