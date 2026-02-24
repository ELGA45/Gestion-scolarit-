<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FiliereRequest extends FormRequest
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
        $filiereId = $this->route('filiere')?->id;

        return [
            'code' => [
                'required',
                'string',
                'max:15',
                Rule::unique('filieres', 'code')->ignore($filiereId),
            ],
            'nom' => [
                'required',
                'string',
                'max:100',
                Rule::unique('filieres', 'nom')->ignore($filiereId),
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
        ];
    }
}