<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClasseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'code' => strtoupper(trim($this->code)),
            'nom'  => ucwords(strtolower(trim($this->nom))),
        ]);
    }

    public function rules(): array
    {
        return [
            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('classes', 'code'),
            ],
            'nom' => [
                'required',
                'string',
                'max:100',
                Rule::unique('classes', 'nom'),
            ],
            'filiere_id' => ['required', 'exists:filieres,id'],
            'sous_niveau_id' => ['required', 'exists:sous_niveaux,id'],
            'tarif_id' => ['required', 'exists:tarifs,id'],
        ];
    }
}