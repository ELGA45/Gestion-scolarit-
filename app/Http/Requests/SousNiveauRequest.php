<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SousNiveauRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'code' => trim($this->code),
            'nom'  => trim($this->nom),
        ]);
    }

    public function rules(): array
    {
        $sousNiveauId = $this->route('sous_niveau')?->id;

        return [
            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('sous_niveaux', 'code')
                    ->ignore($sousNiveauId),
            ],
            'nom' => [
                'required',
                'string',
                'max:100',
                Rule::unique('sous_niveaux', 'nom')
                    ->ignore($sousNiveauId),
            ],
            'niveau_id' => [
                'required',
                'exists:niveaux,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Le code est obligatoire.',
            'code.unique'   => 'Ce code existe déjà.',
            'nom.required'  => 'Le nom est obligatoire.',
            'nom.unique'    => 'Ce nom existe déjà.',
            'niveau_id.required' => 'Le niveau est obligatoire.',
        ];
    }
}