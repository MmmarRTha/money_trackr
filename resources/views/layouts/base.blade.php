<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'MoneyTrackr') }} - @yield("title")</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.s'])
    @endif

    <!-- Tailwind elements is required -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>

<body class="bg-black">
@if(session('success'))
    <div class="max-w-2xl mx-auto pt-5">
        <x-alert :message="session('success')" />
    </div>
@endif

@yield("contents")
</body>

</html>
