<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantMoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_moi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('etudiant_id');
            $table->integer('moi_id')->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('etudiant__moi__retards');
    }
}
