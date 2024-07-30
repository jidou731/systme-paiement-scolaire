<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moi extends Model
{
    use HasFactory;
    protected $fillable=['nom_fr','nom_ar'];
    
    public function paiements(){

       return  $this->belongsToMany('App\Models\Paiement','moi_paiement','moi_id','paiement_id','id','id');
    }
    public function etudiants(){
        return $this->belongsToMany('App\Models\Etudiant');
    }
}
