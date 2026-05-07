<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDemandeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'beneficiaire' => ['required', 'string', 'max:255'],
            'direction' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:achat,fonds,reglement'],
            'objet' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'justification' => ['required', 'string', 'max:2000'],
            'observations' => ['nullable', 'string'],
            'piece_justificative_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:10240'],
            'piece_justificative_text' => ['nullable', 'string'],
        ];

        if ($this->input('type') === 'achat') {
            $rules['articles'] = ['required', 'array', 'min:1'];
            $rules['articles.*.description'] = ['required', 'string', 'max:255'];
            $rules['articles.*.quantite'] = ['required', 'numeric', 'min:1'];
            $rules['articles.*.prix'] = ['required', 'numeric', 'min:0'];
            $rules['entreprise'] = ['nullable', 'string', 'max:255'];
            $rules['libelle_facture'] = ['nullable', 'string', 'max:255'];
        } elseif ($this->input('type') === 'fonds') {
            $rules['articles'] = ['nullable', 'array'];
            $rules['articles.*.description'] = ['nullable', 'string', 'max:255'];
            $rules['articles.*.quantite'] = ['nullable', 'numeric', 'min:1'];
            $rules['articles.*.prix'] = ['nullable', 'numeric', 'min:0'];
            $rules['montant_direct'] = ['nullable', 'numeric', 'min:0'];
        } elseif ($this->input('type') === 'reglement') {
            $rules['fournisseur'] = ['required', 'string', 'max:255'];
            $rules['montant_direct'] = ['required', 'numeric', 'min:0'];
        }

        return $rules;
    }
}
