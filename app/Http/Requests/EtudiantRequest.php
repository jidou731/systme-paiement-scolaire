<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantRequest extends FormRequest
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
            'code' => 'required|unique:etudiants,code',
            'nom_fr' => 'required|max:255',
            'nom_ar' => 'required|max:255',
            'prenom_fr' => 'required|max:255',
            'prenom_ar' => 'required|max:255',
            'niveau_id' => 'required',
            'sexe_fr' => 'required',
            'numero' => 'required|max:8|min:8',
            'numero_parent' => 'required|max:8|min:8',
            'date_naissance' => 'required',
            'date_inscription' => 'required',
            'prix_mentiel' => 'required',
        ];
    }
    public function messages()
    {
        return
            [
            'code.required' => __('message.svp le code de letudiant est obligatoire'),
            'code.unique' => __('message.svp le code est deja utiliser'),
            'nom_fr.required' => __('message.svp le nom en francais est obligatoire'),
            'nom_fr.max' => __('message.svp le nom doit etre inferier ou egal a 255 character'),
            'nom_ar.required' => __('message.svp le nom en arabe est obligatoire'),
            'nom_ar.max' => __('message.svp le nom doit etre inferier ou egal a 255 character'),
            'prenom_fr.required' => __('message.svp le prenom en francais est obligatoire'),
            'prenom_fr.max' => __('message.svp le prenom doit etre inferier ou egal a 255 character'),
            'prenom_ar.required' => __('message.svp le prenom en arabe est obligatoire'),
            'prenom_ar.max' => __('message.svp le prenom doit etre inferier ou egal a 255 character'),
            'sexe_fr.required' => __('message.svp le sexe est obligatoire'),
            'numero.required' => __('message.svp le numero est obligatoire'),
            'numero.max' => __('message.svp le numero doit etre egal a 8 chifre'),
            'numero.min' => __('message.svp le numero doit etre egal a 8 chifre'),
            'numero_parent.required' => __('message.svp le numero de parent est obligatoire'),
            'numero_parent.max' => __('message.svp le numero  doit etre egal a 8 chifre'),
            'numero_parent.min' => __('message.svp le numero  doit etre egal a 8 chifre'),
            'date_naissance.required' => __('message.svp le date naissance est obligatoire'),
            'Niveaux_id.required' => __('message.svp le niveau est obligatoire'),
            'date_inscription.required' => __('message.svp le date inscription est obligatoire'),
            'prix_mentiel.required' => __('message.svp le prix mentiel est obligatoire'),
        ];
    }
}
