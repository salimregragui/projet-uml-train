<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrajetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gare_depart');
            $table->unsignedBigInteger('gare_arrivee');
            $table->unsignedBigInteger('train_id');
            $table->foreign('gare_depart')->references('id')->on('gares');
            $table->foreign('gare_arrivee')->references('id')->on('gares');
            $table->foreign('train_id')->references('id')->on('trains');
            $table->dateTime('heure_depart');
            $table->dateTime('heure_arrivee');
            $table->integer('retard');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trajets');
    }
}
