<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-layout.meta />
        <title>{{ config('app.name', '1 Block Ghana') }}</title>

        <!-- Styles -->
        <x-layout.links />
        @livewireStyles
        @yield('reg-style')
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="theme-purple authentication sidebar-collapse" style="background-image:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),url(assets/images/login-background.jpg)">

        {{ $slot }}


    <x-layout.scripts />

    @livewireScripts
    </body>
    </html>
