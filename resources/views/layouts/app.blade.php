<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Gestion Scolarité') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        <div class="flex-1 flex flex-col">

            {{-- Header --}}
            @include('layouts.partials.header')

            {{-- Contenu --}}
            <main class="flex-1 p-8">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>

            {{-- Footer --}}
            @include('layouts.partials.footer')

        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
