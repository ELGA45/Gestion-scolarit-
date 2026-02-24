@extends('layouts.app')

@section('title', 'Gestion des Filières')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Liste des Filières</h2>
    <a href="{{ route('filieres.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Nouvelle Filière
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{ $errors->first() }}
    </div>
@endif

<div class="bg-white shadow rounded overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-2">Code</th>
                <th class="text-left px-4 py-2">Nom</th>
                <th class="text-right px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($filieres as $filiere)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $filiere->code }}</td>
                    <td class="px-4 py-2">{{ $filiere->nom }}</td>
                    <td class="px-4 py-2 text-right space-x-2">

                        <a href="{{ route('filieres.edit', $filiere) }}"
                           class="text-blue-600 hover:underline">
                            Modifier
                        </a>

                        <form action="{{ route('filieres.destroy', $filiere) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Confirmer suppression ?')"
                                class="text-red-600 hover:underline">
                                Supprimer
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                        Aucune filière enregistrée.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $filieres->links() }}
</div>

@endsection