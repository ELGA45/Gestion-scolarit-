<div class="mb-4">
    <label class="block text-gray-700 mb-1">Code</label>
    <input type="text"
           name="code"
           value="{{ old('code', $filiere->code ?? '') }}"
           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">

    @error('code')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 mb-1">Nom</label>
    <input type="text"
           name="nom"
           value="{{ old('nom', $filiere->nom ?? '') }}"
           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">

    @error('nom')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>