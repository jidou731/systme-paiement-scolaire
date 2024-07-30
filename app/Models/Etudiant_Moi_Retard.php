<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant_Moi_Retard extends Model
{
    protected $table='etudiant_moi';
    use HasFactory;
    
    public function mois()
    {
        return $this->belongsTo('App\Models\Moi');
    }
}
