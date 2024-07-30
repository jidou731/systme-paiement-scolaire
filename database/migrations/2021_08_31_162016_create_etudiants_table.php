<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->integer('niveau_id')->unsigned()->nullable();
            $table->string('nom_fr');
            $table->string('nom_ar');
            $table->string('slug')->unique();
            $table->string('prenom_fr');
            $table->string('prenom_ar');
            $table->string('sexe_fr');
            $table->string('sexe_ar');
            $table->integer('numero');
            $table->integer('numero_parent');
            $table->date('date_naissance');
            $table->date('date_inscription');
            $table->integer('prix_mentiel');
            $table->timestamps();
            $table->foreign('niveau_id')->references('id')->on('niveaux');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
