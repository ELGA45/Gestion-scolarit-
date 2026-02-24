<div x-data="{ open: false }" class="flex flex-col bg-gray-800 text-gray-200 min-h-screen transition-all duration-300"
    :class="open ? 'w-64' : 'w-16'">

    <!-- Logo -->
    <div class="flex items-center justify-center h-16 border-b border-gray-700">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto" x-show="open">
        <span class="text-xl font-bold" x-show="open">Gestion Scolarité</span>
        <span class="text-xl font-bold" x-show="!open">GS</span>
    </div>

    <!-- Toggle Button -->
    <button @click="open = !open" class="p-3 focus:outline-none hover:bg-gray-700">
        <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Menu Items -->
    <nav class="mt-4 flex-1">
        @php
            $menuItems = [
                [
                    'label' => 'Dashboard',
                    'route' => 'dashboard',
                    'icon' =>
                        'M3 13.5V6a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6v7.5m-18 0A2.25 2.25 0 005.25 18h13.5A2.25 2.25 0 0021 13.5m-18 0v4.5m18-4.5v4.5',
                ],
                [
                    'label' => 'Filière',
                    'route' => 'filieres.index',
                    'icon' => 'M3 7.5h18M3 12h18M3 16.5h18',
                ],
                [
                    'label' => 'Niveaux',
                    'route' => 'niveaux.index',
                    'icon' => 'M12 6v12m-6-6h12',
                ],
            ];
        @endphp

        @foreach ($menuItems as $item)
            <a href="{{ route($item['route']) }}"
                class="flex items-center gap-2 px-4 py-2 hover:bg-blue-700 transition
               {{ request()->routeIs($item['route'] . '*') ? 'bg-blue-700 text-white' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $item['icon'] }}" />
                </svg>
                <span x-show="open" class="whitespace-nowrap">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>
</div>
