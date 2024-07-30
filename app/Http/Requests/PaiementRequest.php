<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaiementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_paiement_fr' => 'required',
            'total_payer' => 'required',
            'mois' => 'required',
            'etudiant_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'type_paiement_fr.required' => __('message.svp le type de paiement est obligatoire'),
            'total_payer.required' => __('message.svp le montent  de paiement est obligatoire'),
            'etudiant_id.required' => __('message.svp code de letudiant est obligatoire'),
            'mois.required' => __('message.svp il est obligatoirement de cocher au moins un mois'),
        ];
    }
}
