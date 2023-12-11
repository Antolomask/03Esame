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
        Schema::create('comuniitaliani', function (Blueprint $table) {
            $table->id('idComuneItaliano');
            $table->string('nome', 45);
            $table->string('regione', 45);
            $table->string('metropolitana', 45);
            $table->char('siglaAutomobilistica', 2);
            $table->char('codiceCatastale', 4);
            $table->string('capoluogo', 10);
            $table->string('multicap', 2);
            $table->char('cap', 10);
            $table->char('capFine', 10);
            $table->char('capInizio', 10);
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
        Schema::dropIfExists('comuniItaliani');
    }
};
