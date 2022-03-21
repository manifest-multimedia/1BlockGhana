<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="The Authentic platform to get your Estate with ease and secured">

        <title>{{ config('app.name', '1 Block Ghana') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
{{--         <link rel="icon" href="favicon.ico" type="image/x-icon">  --}}<!-- Favicon-->
        <link rel="stylesheet" href="{{asset ('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/authentication.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/color_skins.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/1block_login.css')}}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="theme-purple authentication sidebar-collapse">


        @yield('content')


        <!-- Jquery Core Js -->
    <script src="{{ asset('assets/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
    <script>
    $(".navbar-toggler").on('click',function() {
        $("html").toggleClass("nav-open");
    });
    </script>

    @livewireScripts
    </body>
    </html>
