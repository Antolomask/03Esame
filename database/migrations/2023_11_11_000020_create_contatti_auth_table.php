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
        Schema::create('contattiAuth', function (Blueprint $table) {
            $table->id('idContattoAuth');
            $table->unsignedBigInteger('idContatto');
            $table->string('user', 255);
            $table->string('sfida', 255);
            $table->string('secretJWT',255);
            $table->char('inizioSfida', 10)->default(0);
            $table->char('obbligoCambio', 3)->default(0);
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
        Schema::dropIfExists('contattiAuth');
    }
};
