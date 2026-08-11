<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>
        {{ config('app.name', 'MoneyTrackr') }} -
        @yield('title')
    </title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen bg-neutral-950 text-neutral-100">
    @if (session('success'))
        <div class="mx-auto max-w-2xl pt-5">
            <x-alert :message="session('success')" />
        </div>
    @endif
    @yield('contents')
</body>
</html>
