<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-layout.meta />
        <title>{{ config('app.name', '1 Block Ghana') }}</title>

        <!-- Styles -->
        <x-layout.links />
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="theme-purple authentication sidebar-collapse">

        {{ $slot }}


    <x-layout.scripts />

    @livewireScripts
    </body>
    </html>
