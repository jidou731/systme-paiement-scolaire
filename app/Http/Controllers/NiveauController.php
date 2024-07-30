<?php

namespace App\Http\Controllers;

use App\Http\Requests\NiveauRequest;
use App\Models\Niveau;
use Illuminate\Support\Str;

class NiveauController extends Controller
{
   
    
    public function index()
    {
        $niveaux = Niveau::select(
            'id',
            'slug',
            'nom',
        )->paginate(5);
        return view('niveaux.index')->with('niveaux', $niveaux);
    }

    
    public function create()
    {
        return view('niveaux.create');
    }

   
    public function store(NiveauRequest $request)
    {
        $niveaux = Niveau::create([
            'niveau_nom' => $request->niveau_nom,
            'slug' => Str::slug($request->niveau_nom),
        ]);
        return redirect()->route('niveau.index')
            ->with('success', __("message.Niveau ajouter avec sucess"));
    }

    
    public function show(Niveau $niveau)
    {

    }

    
    public function edit($slug)
    {
        $niveau = Niveau::where('slug', $slug)->firstOrFail();
        return view('niveaux.edit')->with('niveau', $niveau);
    }

   
    public function update(NiveauRequest $request, Niveau $niveau)
    {
        $niveau->update($request->all());
        return redirect()->route('niveau.index')
            ->with('success', __("message.Niveau modifier avec sucess"));

    }

   
    public function destroy(Niveau $niveau)
    {
        $niveau->etudiants()->update(['niveau_id' => null]); //si on  suprime un niveau les autre etudiant de cette niveaux vont avoir null dans les nom de leur classe
        $niveau->delete();
        return redirect()->route('niveau.index')
            ->with('success', __("message.Niveau suprimer avec success"));
    }
}
