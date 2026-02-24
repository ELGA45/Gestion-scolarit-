@extends('layouts.app')

@section('title', 'Modifier Filière')

@section('content')

<div class="bg-white shadow rounded p-6 max-w-xl">

    <h2 class="text-xl font-semibold mb-4">Modifier Filière</h2>

    <form action="{{ route('filieres.update', $filiere) }}" method="POST">
        @csrf
        @method('PUT')

        @include('filieres.partials.form')

        <div class="mt-4">
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Mettre à jour
            </button>
        </div>
    </form>

</div>

@endsection