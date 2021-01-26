<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrespondancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correspondance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gare_depart');
            $table->unsignedBigInteger('gare_arrivee');
            $table->unsignedBigInteger('train_id');
            $table->unsignedBigInteger('gare_precedente');
            $table->unsignedBigInteger('idTrajet');
            $table->foreign('idTrajet')->references('id')->on('trajets');
            $table->foreign('gare_precedente')->references('id')->on('gares');
            $table->foreign('gare_depart')->references('id')->on('gares');
            $table->foreign('gare_arrivee')->references('id')->on('gares');
            $table->foreign('train_id')->references('id')->on('trains');
            $table->dateTime('heure_depart');
            $table->dateTime('heure_arrivee');
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
        Schema::dropIfExists('correspondance');
    }
}
