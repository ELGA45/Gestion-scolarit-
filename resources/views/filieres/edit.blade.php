@extends('layouts.app')

@section('title', 'Modifier Filière')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                Modifier Filière
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

            <form action="{{ route('filieres.update', $filiere) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                @include('filieres.partials.form')

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('filieres.index') }}"
                        class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition">
                        Annuler
                    </a>

                    <button type="submit"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow transition">
                        Mettre à jour
                    </button>
                </div>
            </form>

        </div>

    </div>

@endsection
