<div x-data="{ open: true }"
    class="flex flex-col bg-gradient-to-b from-gray-900 to-gray-800 text-gray-200 min-h-screen shadow-xl transition-all duration-300"
    :class="open ? 'w-64' : 'w-20'">

    {{-- Logo --}}
    <div class="flex items-center justify-center h-16 border-b border-gray-700">
        <span class="text-2xl font-bold tracking-wide" x-show="open">
            🎓 Gestion Scolarité
        </span>
        <span class="text-xl font-bold" x-show="!open">GS</span>
    </div>

    {{-- Toggle --}}
    <button @click="open = !open" class="p-3 hover:bg-gray-700 transition text-gray-300 hover:text-white">
        <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    {{-- Menu --}}
    <nav class="mt-6 flex-1 space-y-2 px-2">

        @php
            $menuItems = [
                ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => '🏠'],
                ['label' => 'Filières', 'route' => 'filieres.index', 'icon' => '📘'],
                ['label' => 'Niveaux', 'route' => 'niveaux.index', 'icon' => '🎓'],
            ];
        @endphp

        @foreach ($menuItems as $item)
            <a href="{{ route($item['route']) }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
               {{ request()->routeIs($item['route'] . '*')
                   ? 'bg-blue-600 text-white shadow'
                   : 'hover:bg-gray-700 hover:text-white' }}">

                <span class="text-lg">{{ $item['icon'] }}</span>
                <span x-show="open" class="font-medium">
                    {{ $item['label'] }}
                </span>
            </a>
        @endforeach
    </nav>

    {{-- Bas sidebar --}}
    <div class="p-4 text-xs text-gray-400 border-t border-gray-700" x-show="open">
        Version 1.0
    </div>
</div>
