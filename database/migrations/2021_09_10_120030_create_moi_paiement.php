<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoiPaiement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moi_paiement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paiement_id')->unsigned();
            $table->integer('moi_id')->unsigned();
            $table->timestamps();
            $table->foreign('paiement_id')->references('id')->on('paiements')->onDelete('cascade');
            $table->foreign('moi_id')->references('id')->on('mois')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moi_paiement');
    }
}
