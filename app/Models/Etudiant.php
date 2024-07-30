<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'nom_fr', 'slug', 'nom_ar', 'prenom_fr', 'prenom_ar', 'sexe_fr', 'sexe_ar', 'numero', 'numero_parent', 'date_naissance', 'niveau_id', 'date_inscription', 'prix_mentiel'];

    public function niveau()
    {

        return $this->belongsTo('App\Models\Niveau', 'niveau_id', 'id');
    }
    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'etudiant_id','id');
    }

    public function mois_payes()
    {
        return $this->hasManyThrough(
            Moi_Paiement::class,
            Paiement::class,
            'etudiant_id',
            'paiement_id'
        );
    }
    public function mois()
    {
        return $this->belongsToMany('App\Models\Moi');
    }
    public function mois_retard()
    {
        return $this->hasManyThrough(
            Etudiant_Moi_Retard::class,
            Moi::class,
            'etudiant_moi.etudiant_id',
            'moi_id'
        );
    }
}
