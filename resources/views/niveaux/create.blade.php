@extends('layouts.app')

@section('title', 'Gestion des Niveaux')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                Ajouter un Niveau
            </h2>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 p-4 rounded-lg mb-6">
                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('niveaux.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nom du niveau
                    </label>

                    <input type="text" name="nom" value="{{ old('nom') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('niveaux.index') }}"
                        class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition">
                        Annuler
                    </a>

                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition">
                        Enregistrer
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection
