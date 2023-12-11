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
        Schema::create('contattiSessioni', function (Blueprint $table) {
            $table->id('idContattoSessione');
            $table->unsignedBigInteger('idContatto');
            $table->longText('token')->nullable();
            $table->string('inizioSessione', 10)->default(0);
            $table->timestamps();

            $table->foreign('idContatto')->references('idContatto')->on('contatti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contattiSessioni');
    }
};
