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
        Schema::create('film', function (Blueprint $table) {
            $table->id('idFilm');
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idTipologia');
            $table->string('nome', 45);
            $table->string('trama', 255);
            $table->string('durataMin', 20);
            $table->char('annoUscita', 4);
            $table->char('visualizzato', 1)->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idCategoria')->references('idCategoria')->on('categorie');
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
        Schema::dropIfExists('film');
    }
};
