<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Inter:opsz@14..32&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-dvh flex items-center font-geist mx-4">
    <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-x-4 md:gap-x-6 w-full">
        <div class="col-span-4 md:col-span-2 lg:col-span-2 md:col-start-4 lg:col-start-6 flex justify-center">
    <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </a>
</div>

        <div class="md:col-start-3 lg:col-start-5 col-span-4 mb-10">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
