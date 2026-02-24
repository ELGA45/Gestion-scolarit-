@extends('layouts.app')

@section('title', 'Gestion des Niveaux')

@section('content')

    {{-- Ajouter Niveau --}}
    <a href="{{ route('niveaux.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
        Ajouter Niveau
    </a>

    @foreach ($niveaux as $niveau)
        <div class="bg-white shadow rounded mb-6">

            {{-- Header Niveau --}}
            <div class="flex justify-between items-center p-4 border-b bg-gray-50">
                <h2 class="font-bold text-lg">
                    {{ $niveau->nom }}
                </h2>

                <div class="flex gap-3 items-center">

                    {{-- Modifier Niveau --}}
                    <a href="{{ route('niveaux.edit', $niveau) }}" class="text-blue-600">
                        Modifier
                    </a>

                    {{-- Supprimer Niveau --}}
                    @if (!$niveau->sousNiveaux->count())
                        <form method="POST" action="{{ route('niveaux.destroy', $niveau) }}"
                            onsubmit="return confirm('Supprimer ce niveau ?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-600">
                                Supprimer
                            </button>
                        </form>
                    @endif

                    {{-- Ajouter SousNiveau --}}
                    <a href="{{ route('niveaux.sousNiveaux.create', $niveau) }}" class="text-green-600 font-semibold">
                        + SousNiveau
                    </a>

                </div>
            </div>

            {{-- Tableau SousNiveaux --}}
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Code</th>
                        <th class="p-2">Nom</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($niveau->sousNiveaux as $sous)
                        <tr class="border-b">
                            <td class="p-2">{{ $sous->code }}</td>
                            <td class="p-2">{{ $sous->nom }}</td>
                            <td class="p-2 flex gap-3">

                                {{-- Modifier SousNiveau (redirige vers edit niveau) --}}
                                <a href="{{ route('sousNiveaux.edit', $sous) }}" class="text-blue-600">
                                    Modifier
                                </a>

                                {{-- Supprimer SousNiveau --}}
                                <form method="POST" action="{{ route('sousNiveaux.destroy', $sous) }}"
                                    onsubmit="return confirm('Supprimer ce sous-niveau ?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-600">
                                        Supprimer
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center text-gray-500">
                                Aucun sous-niveau
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    @endforeach

@endsection
