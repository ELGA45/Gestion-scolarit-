<div class="space-y-6">

    {{-- Code --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Code de la Filière
        </label>

        <input type="text"
               name="code"
               value="{{ old('code', $filiere->code ?? '') }}"
               placeholder="Ex: INFO"
               class="w-full rounded-lg border border-gray-300 px-4 py-2
                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                      transition duration-200 outline-none
                      @error('code') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">

        @error('code')
            <p class="text-red-500 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Nom --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Nom de la Filière
        </label>

        <input type="text"
               name="nom"
               value="{{ old('nom', $filiere->nom ?? '') }}"
               placeholder="Ex: Informatique"
               class="w-full rounded-lg border border-gray-300 px-4 py-2
                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                      transition duration-200 outline-none
                      @error('nom') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">

        @error('nom')
            <p class="text-red-500 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror
    </div>

</div>