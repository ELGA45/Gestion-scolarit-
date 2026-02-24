<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NiveauRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'nom' => trim($this->nom),
        ]);
    }

    public function rules(): array
    {
        $niveauId = $this->route('niveau')?->id;

        return [
            'nom' => [
                'required',
                'string',
                'max:100',
                Rule::unique('niveaux', 'nom')
                    ->ignore($niveauId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.unique'   => 'Ce niveau existe déjà.',
        ];
    }
}