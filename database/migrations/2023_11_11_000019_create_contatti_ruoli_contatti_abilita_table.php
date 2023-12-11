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
        Schema::create('contattiRuoli_contattiAbilita', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idContattoAbilita');
            $table->unsignedBigInteger('idContattoRuolo');
            $table->timestamps();

            $table->foreign('idContattoAbilita')->references('idContattoAbilita')->on('contattiAbilita');
            $table->foreign('idContattoRuolo')->references('idContattoRuolo')->on('contattiRuoli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contattiRuoli_contattiAbilita');
    }
};
