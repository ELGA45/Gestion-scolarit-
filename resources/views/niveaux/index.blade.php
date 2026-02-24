@extends('layouts.app')

@section('title', 'Gestion des Niveaux')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- Header + Bouton --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Gestion des Niveaux</h1>
                <p class="text-gray-500 text-sm">
                    Liste complète des niveaux et des Sous niveaux
                </p>
            </div>

            <a href="{{ route('niveaux.create') }}"
                class="bg-blue-600 hover:bg-blue-700 transition text-white px-5 py-2 rounded-lg shadow">
                + Ajouter Niveau
            </a>
        </div>

        @foreach ($niveaux as $niveau)
            <div class="bg-white rounded-2xl shadow-md mb-8 overflow-hidden border border-gray-100">

                {{-- Header Niveau --}}
                <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-semibold text-gray-700">
                        {{ $niveau->nom }}
                    </h2>

                    <div class="flex items-center gap-4 text-sm font-medium">

                        <a href="{{ route('niveaux.edit', $niveau) }}" class="text-blue-600 hover:text-blue-800 transition">
                            Modifier
                        </a>

                        @if (!$niveau->sousNiveaux->count())
                            <form method="POST" action="{{ route('niveaux.destroy', $niveau) }}"
                                onsubmit="return confirm('Supprimer ce niveau ?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-800 transition">
                                    Supprimer
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('niveaux.sousNiveaux.create', $niveau) }}"
                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg shadow-sm transition">
                            + SousNiveau
                        </a>
                    </div>
                </div>

                {{-- Tableau --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-gray-700">

                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                            <tr>
                                <th class="px-6 py-3 text-left">Code</th>
                                <th class="px-6 py-3 text-left">Nom</th>
                                <th class="px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @forelse ($niveau->sousNiveaux as $sous)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-3 font-medium">
                                        {{ $sous->code }}
                                    </td>

                                    <td class="px-6 py-3">
                                        {{ $sous->nom }}
                                    </td>

                                    <td class="px-6 py-3 flex gap-4">

                                        <a href="{{ route('sousNiveaux.edit', $sous) }}"
                                            class="text-blue-600 hover:text-blue-800 transition">
                                            Modifier
                                        </a>

                                        <form method="POST" action="{{ route('sousNiveaux.destroy', $sous) }}"
                                            onsubmit="return confirm('Supprimer ce sous-niveau ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800 transition">
                                                Supprimer
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-6 text-center text-gray-400 italic">
                                        Aucun sous-niveau
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        @endforeach

    </div>

@endsection
