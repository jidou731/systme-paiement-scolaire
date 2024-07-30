<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('etudiant_id')->unsigned();
            $table->string('slug');
            $table->string('type_paiement_fr');
            $table->string('type_paiement_ar');
            $table->integer('total_payer');
            $table->integer('rest_payer');
            $table->timestamps();
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements');
    }
}
