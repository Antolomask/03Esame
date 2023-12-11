<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodi', function (Blueprint $table) {
            $table->id('idEpisodio');
            $table->unsignedBigInteger('idSerieTv');
            $table->unsignedBigInteger('idTipologia');
            $table->string('nome', 45);
            $table->string('stagione', 45);
            $table->string('durataEpisodioMin', 45);            
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idSerieTv')->references('idSerieTv')->on('serieTv');
            $table->foreign('idTipologia')->references('idTipologia')->on('tipologie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodi');
    }
};
