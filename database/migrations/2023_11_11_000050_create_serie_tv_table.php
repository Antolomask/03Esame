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
        Schema::create('serieTv', function (Blueprint $table) {
            $table->id('idSerieTv');
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idTipologia');
            $table->string('nome', 45);
            $table->string('trama', 255);
            $table->string('stagioni', 45);
            $table->string('episodi', 10);
            $table->char('annoUscita', 4);
            $table->char('visualizzato', 1)->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idTipologia')->references('idTipologia')->on('tipologie');
            $table->foreign('idCategoria')->references('idCategoria')->on('categorie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serieTv');
    }
};
