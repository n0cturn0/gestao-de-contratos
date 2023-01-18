<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContratoComposicaoFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_composicao_final', function (Blueprint $table) {
            $table->id();
            $table->integer('idsituacao');
            $table->integer('tipo');
            $table->integer('idativo');
            $table->string('valorunitario');
            $table->string('valortotal');
            $table->integer('qtdparcela');
            $table->integer('stateview')->comment('0=show 1=hidden');
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
        //
    }
}
