<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#1A2035] text-white min-h-screen" style="font-family: Inter, sans-serif;">
    <div class="flex min-h-screen">
        @include('components.sidebar')

        <div class="flex-1 flex flex-col min-w-0">
            @include('components.navbar')

            <main class="flex-1 p-6 md:p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>