@extends('layouts.app')

@section('title', 'Gestion des Filières')

@section('content')

    <div class="max-w-6xl mx-auto">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">
                    Gestion des Filières
                </h2>
                <p class="text-gray-500 text-sm">
                    Liste complète des filières enregistrées
                </p>
            </div>

            <a href="{{ route('filieres.create') }}"
                class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition">
                + Nouvelle Filière
            </a>
        </div>

        {{-- Success --}}
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-6">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">

            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">Code</th>
                        <th class="px-6 py-4 text-left">Nom</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse($filieres as $filiere)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4 font-medium text-gray-700">
                                {{ $filiere->code }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $filiere->nom }}
                            </td>

                            <td class="px-6 py-4 text-right space-x-4">

                                <a href="{{ route('filieres.edit', $filiere) }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium transition">
                                    Modifier
                                </a>

                                <form action="{{ route('filieres.destroy', $filiere) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Confirmer suppression ?')"
                                        class="text-red-600 hover:text-red-800 font-medium transition">
                                        Supprimer
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-gray-400">
                                Aucune filière enregistrée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="mt-6">
            {{ $filieres->links() }}
        </div>

    </div>

@endsection
