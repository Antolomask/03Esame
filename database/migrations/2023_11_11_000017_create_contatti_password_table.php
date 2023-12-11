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
        Schema::create('contattiPassword', function (Blueprint $table) {
            $table->id('idContattoPassword');
            $table->unsignedBigInteger('idContatto');
            $table->string('psw', 255);
            $table->string('sale',255);
            $table->softDeletes();
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
        Schema::dropIfExists('utenti_password');
    }
};
