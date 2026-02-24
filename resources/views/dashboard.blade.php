@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-gray-500">Total Étudiants</h3>
        <p class="text-2xl font-bold text-blue-600">120</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-gray-500">Total Classes</h3>
        <p class="text-2xl font-bold text-green-600">8</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-gray-500">Paiements ce mois</h3>
        <p class="text-2xl font-bold text-purple-600">3 500 000 FCFA</p>
    </div>

</div>

@endsection