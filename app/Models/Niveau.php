<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'slug'];

    public function etudiants()
    {

        return $this->hasMany(Etudiant::class, 'niveau_id','id');

    }

}
