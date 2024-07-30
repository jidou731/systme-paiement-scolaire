<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudiantRequest;
use App\Http\Requests\EtudiantUpdateRequest;
use App\Models\Etudiant;
use App\Models\Moi;
use App\Models\Niveau;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class EtudiantController extends Controller
{

    

    public function index()
    {
        
        $etudiant = Etudiant::select('id',
            'code',
            'niveau_id',
            'nom_' . LaravelLocalization::getCurrentLocale() . ' as nom',
            'prenom_' . LaravelLocalization::getCurrentLocale() . ' as prenom',
            'sexe_' . LaravelLocalization::getCurrentLocale() . ' as sexe',
            'numero',
            'slug',
            'numero_parent',
            'date_naissance',
            'date_inscription',
            'prix_mentiel')->paginate(4);
        return view('etudiant.index', compact('etudiant'));

    }

    public function create()
    {
        $niveaux = Niveau::all();
        if ($niveaux->count() == 0) {
            return redirect()->route('niveau.create');
        }
        $mois = Moi::select('id', 'nom_' . LaravelLocalization::getCurrentLocale() . ' as nom')->get();
        
        return view('etudiant.create', compact('niveaux', 'mois'));
    }

    public function store(EtudiantRequest $request)
    {
        if ($request->sexe_fr == 'Homme') {
            $sexe_ar = 'ذكر';
        } else {
            $sexe_ar = 'أنثى';
        }
        $etudiant = Etudiant::create([
            'code' => $request->code,
            'nom_fr' => $request->nom_fr,
            'nom_ar' => $request->nom_ar,
            'prenom_fr' => $request->prenom_fr,
            'prenom_ar' => $request->prenom_ar,
            'niveau_id' => $request->niveau_id,
            'sexe_fr' => $request->sexe_fr,
            'sexe_ar' => $sexe_ar,
            'numero' => $request->numero,
            'numero_parent' => $request->numero_parent,
            'date_naissance' => $request->date_naissance,
            'date_inscription' => $request->date_inscription,
            'prix_mentiel' => $request->prix_mentiel,
            'slug' => Str::slug($request->code * 2021),
        ]);
        $etudiant->mois()->attach($request->mois_retard);
        if($request->prix_mentiel!=0){

            return redirect()->route('paiement.validerPaiement', $etudiant->slug)
            ->with('success', __("message.Etudiant ajouter avec success"));
        }
        else{
            return redirect()->route('etudiant.index')
            ->with('success', __("message.Etudiant Ajouter  avec success"));

        }
        
    }

    public function show()
    {

//
    }

    public function edit($slug)
    {
        $etudiant = Etudiant::where('slug', $slug)->firstorfail();
        $niveaux = Niveau::all();
        $mois = Moi::select('id', 'nom_' . LaravelLocalization::getCurrentLocale() . ' as nom')->get();
        return view('etudiant.edit', compact('etudiant', 'niveaux', 'mois'));

    }

    public function update(EtudiantUpdateRequest $request, Etudiant $etudiant)
    {
        if ($request->sexe_fr == 'Homme') {
            $sexe_ar = 'ذكر';
        } else {
            $sexe_ar = 'أنثى';
        }
        $etudiant->nom_fr = $request->nom_fr;
        $etudiant->nom_ar = $request->nom_ar;
        $etudiant->prenom_fr = $request->prenom_fr;
        $etudiant->prenom_ar = $request->prenom_ar;
        $etudiant->sexe_fr = $request->sexe_fr;
        $etudiant->sexe_ar = $sexe_ar;
        $etudiant->numero = $request->numero;
        $etudiant->numero_parent = $request->numero_parent;
        $etudiant->date_naissance = $request->date_naissance;
        $etudiant->niveau_id = $request->niveau_id;
        $etudiant->date_inscription = $request->date_inscription;
        $etudiant->prix_mentiel = $request->prix_mentiel;
        $etudiant->save();
        $etudiant->mois()->sync($request->mois_retard);
        return redirect()->route('etudiant.index')
            ->with('success', __("message.Etudiant modifier avec success"));

    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->paiements()->delete();
        $etudiant->delete();
        return redirect()->route('etudiant.index')
            ->with('success', __('message.Etudiant suprimer avec success'));
    }
    public function search()
    {

        $search_text = $_GET['query'];
        $etudiant = Etudiant::select('id',
            'code',
            'niveau_id',
            'nom_' . LaravelLocalization::getCurrentLocale() . ' as nom',
            'prenom_' . LaravelLocalization::getCurrentLocale() . ' as prenom',
            'sexe_' . LaravelLocalization::getCurrentLocale() . ' as sexe',
            'numero',
            'slug',
            'numero_parent',
            'date_naissance',
            'date_inscription',
            'prix_mentiel')
            ->where('code', 'LIKE', '%' . $search_text . '%')
            ->orwhere('numero_parent', 'LIKE', '%' . $search_text . '%')
            ->get();
        return view('etudiant.index', compact('etudiant', 'search_text'));

    }
    public function etudiant_niveau($id)
    {

        $etudiant = Etudiant::select('id',
            'code',
            'niveau_id',
            'nom_' . LaravelLocalization::getCurrentLocale() . ' as nom',
            'prenom_' . LaravelLocalization::getCurrentLocale() . ' as prenom',
            'sexe_' . LaravelLocalization::getCurrentLocale() . ' as sexe',
            'numero',
            'slug',
            'numero_parent',
            'date_naissance',
            'date_inscription',
            'prix_mentiel')->where('niveau_id', $id)->get();
        // dd($etudiant);
        return view('etudiant.index', compact('etudiant'));
    }
}
