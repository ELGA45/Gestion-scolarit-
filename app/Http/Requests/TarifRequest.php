<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TarifRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'inscription' => trim($this->inscription),
            'mensualite'  => trim($this->mensualite),
            'autre_frais' => trim($this->autre_frais),
        ]);
    }

    public function rules(): array
    {
        $id = $this->route('tarif')?->id;

        return [
            'inscription' => [
                'required',
                'numeric',
                'min:0',
                Rule::unique('tarifs')
                    ->where(fn ($q) => $q
                        ->where('inscription', $this->inscription)
                        ->where('mensualite', $this->mensualite)
                    )
                    ->ignore($id)
            ],

            'mensualite' => [
                'required',
                'numeric',
                'min:0',
            ],

            'autre_frais' => [
                'nullable',
                'numeric',
                'min:0',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'inscription.min' => 'Le montant inscription ne peut pas être négatif.',
            'mensualite.min'  => 'La mensualité ne peut pas être négative.',
            'autre_frais.min' => 'Les autres frais ne peuvent pas être négatifs.',
            'inscription.unique' => 'Un tarif avec la même inscription et mensualité existe déjà.',
        ];
    }
}