<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaiementRequest;
use App\Models\Etudiant;
use App\Models\Moi;
use App\Models\Niveau;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PaiementController extends Controller
{
    
    
    public function index()
    {
        $paiement = Paiement::latest()->paginate(5);
        $niveaux = Niveau::all();
        $mois = Moi::select('id', 'nom_' . LaravelLocalization::getCurrentLocale() . ' as nom')->get();
        $etudiant = Etudiant::all();

        return view('paiement.index', compact('paiement', 'niveaux', 'mois', 'etudiant'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(PaiementRequest $request)
    {
        //  dd($request->mois);
        $etudiant_id = $request->etudiant_id;
        $prix = Etudiant::find($etudiant_id)->prix_mentiel;
        $rest = ($prix * count($request->mois)) - $request->total_payer;
        // dd($rest);
        $type = $request->type_paiement_fr;
        switch ($type) {
            case 'Espece':
                $type_paiement_ar = 'يدوي';
                break;
            case 'Virement':
                $type_paiement_ar = 'تحويل';
                break;
            case 'Effet':
                $type_paiement_ar = 'ديون';
                break;
            case 'Check':
                $type_paiement_ar = 'شيك';
                break;
        }
        $paiement = Paiement::create([

            'etudiant_id' => $request->etudiant_id,
            'slug' => Str::slug($request->etudiant_id * 2021 + $request->total_payer),
            'type_paiement_fr' => $request->type_paiement_fr,
            'type_paiement_ar' => $type_paiement_ar,
            'rest_payer' => $rest,
            'total_payer' => $request->total_payer,

        ]);

        $paiement->mois()->attach($request->mois);
        return redirect()->route('paiement.index')
            ->with('success', __("message.Etudiant payer avec sucess"));

    }

  
    public function show($slug)
    {
        
     $paiement = Paiement::where('slug', $slug)->firstOrFail();
    //  return $paiement->etudiant->niveau;
        return view('paiement.show', compact('paiement'));
    }

    public function validerPaiement($slug)
    {
        $etudiant = Etudiant::where('slug', $slug)->firstOrFail();
        $mois = Moi::select('id', 'nom_' . LaravelLocalization::getCurrentLocale() . ' as nom')->get();
        $paiement = Paiement::all();
        return view('paiement.validerPaiement', compact('etudiant', 'mois', 'paiement'));

    }

   
    public function edit($slug)
    {
        $paiement = Paiement::where('slug', $slug)->firstOrFail();
        $mois = Moi::select('id', 'nom_' . LaravelLocalization::getCurrentLocale() . ' as nom')->get();
        return view('paiement.edit', compact('paiement', 'mois'));
    }


    public function update(PaiementRequest $request, Paiement $paiement)
    {

        $etudiant_id = $request->etudiant_id;
        $prix = Etudiant::find($etudiant_id)->prix_mentiel;
        $rest = ($prix * count($request->mois)) - $request->total_payer;
        // dd($rest);
        // dd($paiement);
        $type = $request->type_paiement_fr;
        switch ($type) {
            case 'Espece':
                $type_paiement_ar = 'يدوي';
                break;
            case 'Virement':
                $type_paiement_ar = 'تحويل';
                break;
            case 'Effet':
                $type_paiement_ar = 'ديون';
                break;
            case 'Check':
                $type_paiement_ar = 'شيك';
                break;
        }
        $paiement->type_paiement_fr = $request->type_paiement_fr;
        $paiement->type_paiement_ar = $type_paiement_ar;
        $paiement->total_payer = $request->total_payer;
        $paiement->rest_payer = $rest;
        $paiement->save();
        $paiement->mois()->sync($request->mois);
        // $paiement->update($request->all());
        return redirect()->route('paiement.index')
            ->with('success', __("message.paiement modifier avec sucess"));

    }

    
    public function destroy(Paiement $paiement)
    {

        $paiement->delete();

        return redirect()->route('paiement.index')->with('success', __("message.paiement suprimer avec success"));
    }

    public function search(Request $request)
    {
        // test jointure
        //   $niveau =  $request->niveau;
        //   $mois =  $request->mois;

        if ($request->paiement === 'payer') {
            $niveau = $request->niveau;
            $mois_chercher = $request->mois;

            $paiement = Paiement::whereHas('etudiant', function ($query) use ($niveau) {
                return $query->where('niveau_id', '=', $niveau);
            })->whereHas('mois', function ($query) use ($mois_chercher) {
                return $query->where('mois.id', '=', $mois_chercher);
            })->get();
            //whereDoesntHave
            //    return  $paiement = Paiement::with('etudiant')->select('id','etudiant_id','type_paiement_'.LaravelLocalization::getCurrentLocale().
            //        ' as type_paiement','total_payer','rest_payer')->get();

            $niveaux = Niveau::all();
            $mois = Moi::all();
            if (LaravelLocalization::getCurrentLocale() == 'fr') {
                $mois_name = Moi::find($mois_chercher)->nom_fr;
            } else {
                $mois_name = Moi::find($mois_chercher)->nom_ar;
            }

            $niveau_name = Niveau::find($niveau)->niveau_nom;
            return view('paiement.index', compact('paiement', 'niveaux', 'mois', 'mois_name', 'niveau_name'));
        } elseif ($request->paiement === 'non payer') {
            $niveau = $request->niveau;
            $mois = $request->mois;
            // $etudiant=Etudiant::all();
            $etudiant = DB::select("SELECT * FROM etudiants WHERE niveau_id='$niveau' 
            AND prix_mentiel<>0 AND id NOT
            IN(SELECT etudiant_id FROM paiements WHERE id
            IN(SELECT paiement_id FROM moi_paiement WHERE moi_id= '$mois')) AND id NOT IN(select etudiant_id FROM etudiant_moi WHERE moi_id='$mois')");
//  dd($etudiant);
            $niveaux = Niveau::all();
            $moi = Moi::all();
            if (LaravelLocalization::getCurrentLocale() == 'fr') {
                $mois_name = Moi::find($mois)->nom_fr;
            } else {
                $mois_name = Moi::find($mois)->nom_ar;
            }

            $niveau_name = Niveau::find($niveau)->niveau_nom;
            $niveau_prix = Niveau::find($niveau)->prix;
            return view('paiement.search', compact('etudiant', 'niveaux', 'mois_name', 'niveau_name', 'niveau_prix'));
        } elseif ($request->paiement === 'rest') {
            $niveau = $request->niveau;
            $mois_chercher = $request->mois;
            $paiement = Paiement::whereHas('etudiant', function ($query) use ($niveau) {
                return $query->where('niveau_id', '=', $niveau);
            })->whereHas('mois', function ($query) use ($mois_chercher) {
                return $query->where('mois.id', '=', $mois_chercher)->Where('paiements.rest_payer', '!=', 0);
            })->get();
            $niveaux = Niveau::all();
            $mois = Moi::all();
            if (LaravelLocalization::getCurrentLocale() == 'fr') {
                $mois_name = Moi::find($mois_chercher)->nom_fr;
            } else {
                $mois_name = Moi::find($mois_chercher)->nom_ar;
            }

            $niveau_nom = Niveau::find($niveau)->niveau_nom;
            return view('paiement.index', compact('paiement', 'niveaux', 'mois', 'mois_name', 'niveau_nom'));

        }

    }
    public function chercherPaiementsEtudiant(Request $request)
    {
        $code = $request->q;
        // dd($code);
        // $paiement = Paiement::where('etudiant_id', $code)->get();
        $paiement = Paiement::whereHas('etudiant', function ($query) use ($code) {
            return $query->where('code', '=', $code);
        })->get();
        $niveaux = Niveau::all();
        $mois = Moi::select('id', 'nom_' . LaravelLocalization::getCurrentLocale() . ' as nom')->get();

        return view('paiement.index', compact('paiement', 'niveaux', 'mois'));
    }
    public function EtudiantId(Request $request)
    {
        $id = $request->matricule;
        $etudiant = Etudiant::where('code', $id)->first();
        // dd($etudiant);
        if ($etudiant == null) {
            return back()->with('vide', __("message.Etudiant nexiste pas"));
        }

        // dd($etudiant);
        $slug = $etudiant->slug;
        return redirect()->route('paiement.validerPaiement', $slug);
    }

}
