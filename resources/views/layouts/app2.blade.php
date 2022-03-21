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
        <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/color_skins.css')}}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
