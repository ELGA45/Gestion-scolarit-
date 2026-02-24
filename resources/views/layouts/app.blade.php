<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Gestion Scolarité') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        <div class="flex-1 flex flex-col">

            {{-- Header --}}
            @include('layouts.partials.header')

            {{-- Contenu principal --}}
            <main class="flex-1 p-6">
                {{ $slot ?? '' }}
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('layouts.partials.footer')

        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.js"></script>
</body>

</html>
