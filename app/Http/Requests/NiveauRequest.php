<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NiveauRequest extends FormRequest
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
            'niveau_nom' => 'required|unique:niveaux,niveau_nom',

        ];
    }
    public function messages()
    {
        return [
            'niveau_nom.required' => __('svp le nom est obligatoire'),
            'niveau_nom.unique' => __('svp le nom  est deja utiliser'),
        ];
    }
}
