<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="The Authentic platform to get your Estate with ease and secured">

        <title>{{ config('app.name', '1 Block Ghana') }}</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
        <link rel="stylesheet" href="{{ asset('assets/plugins/morrisjs/morris.min.css')}}" />
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/color_skins.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/1block_body.scss')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/1block_dashboard.css')}}">

        @livewireStyles
    </head>
    <body class="theme-blue">
        <!-- Top Bar -->
        <x-backend.header />
        <x-backend.sidebar />

            <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Agents" menu="Add Agent" />
    {{ $slot }}
    </section>


        {{-- @yield('dashboard') --}}

<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{ asset('assets/bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->
<script src="{{ asset('assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob Plugin Js -->
<script src="{{ asset('assets/bundles/countTo.bundle.js')}}"></script> <!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->

<script src="{{ asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{ asset('assets/js/pages/index.js')}}"></script>

@livewireScripts
</body>
</html>
