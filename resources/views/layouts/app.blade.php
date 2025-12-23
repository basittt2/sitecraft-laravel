<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SiteCraft') }}</title>

        <!-- Laravel / auth assets (keep these so Breeze / auth pages still work) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Main marketing/site styles (loaded AFTER Vite so these win if there are conflicts) -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Site scripts (cart, filters, etc.) -->
        <script src="{{ asset('js/main.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    </head>
    <body>
        {{-- Global site header with logo + navigation --}}
        @include('partials.header')

        <main>
            @if (isset($slot))
                {{ $slot }}
            @else
                @yield('content')
            @endif
        </main>

        {{-- Global footer --}}
        @include('partials.footer')
    </body>
</html>
