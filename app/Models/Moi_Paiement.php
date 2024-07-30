<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moi_Paiement extends Model
{
    protected $table='moi_paiement';
    use HasFactory;
    
    public function mois()
    {
        return $this->belongsTo('App\Models\Moi');
    }
    
}
