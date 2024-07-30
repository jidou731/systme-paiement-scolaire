<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $table = 'paiements';
    protected $fillable = ['type_paiement_fr', 'slug', 'type_paiement_ar', 'etudiant_id', 'total_payer', 'rest_payer'];

    public function etudiant()
    {
        return $this->belongsTo('App\Models\Etudiant', 'etudiant_id','id');
    }

    public function mois()
    {
        return $this->belongsToMany('App\Models\Moi','moi_paiement','paiement_id','moi_id','id','id');
    }
}
