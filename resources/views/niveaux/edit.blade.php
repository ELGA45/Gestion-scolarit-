@extends('layouts.app')

@section('title', 'Gestion des Niveaux')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-6">
            Modifier le Niveau:
            <span class="text-blue-600">{{ $niveau->nom }}</span>
        </h2>

        {{-- Affichage erreurs --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('niveaux.update', $niveau) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Nom du niveau
                </label>

                <input type="text" name="nom" value="{{ old('nom', $niveau->nom) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" required>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('niveaux.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">
                    Annuler
                </a>

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Mettre à jour
                </button>
            </div>
        </form>

    </div>
@endsection
