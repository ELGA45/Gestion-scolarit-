@extends('layouts.app')

@section('title', 'Créer une Filière')

@section('content')

<div class="bg-white shadow rounded p-6 max-w-xl">

    <h2 class="text-xl font-semibold mb-4">Nouvelle Filière</h2>

    <form action="{{ route('filieres.store') }}" method="POST">
        @csrf

        @include('filieres.partials.form')

        <div class="mt-4">
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Enregistrer
            </button>
        </div>
    </form>

</div>

@endsection