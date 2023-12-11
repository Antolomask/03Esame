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
        Schema::create('contatti', function (Blueprint $table) {
            $table->id('idContatto');
            $table->unsignedBigInteger('idContattoStato');
            $table->string('nome', 45)->nullable();
            $table->string('cognome', 45);
            $table->unsignedTinyInteger('sesso')->unsigned()->nullable();
            $table->string('codiceFiscale',45)->nullable();
            $table->string('partitaIva',45)->nullable();
            $table->string('cittadinanza', 45)->nullable();
            $table->unsignedBigInteger('idNazioneNascita')->unsigned()->nullable();
            $table->string('cittaNascita', 45)->nullable();
            $table->string('provinciaNascita', 45)->nullable();
            $table->string('dataNascita')->nullable();
            $table->char('visualizzato', 1)->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idContattoStato')->references('idContattoStato')->on('contattiStati');
            $table->foreign('idNazioneNascita')->references('idNazione')->on('nazioni');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utenti');
    }
    
    
};
