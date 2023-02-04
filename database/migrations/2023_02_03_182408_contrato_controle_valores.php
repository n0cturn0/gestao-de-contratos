<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContratoControleValores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_ccontrole_valores', function (Blueprint $table) {
            $table->id();
            $table->integer('idcomposicao');
            $table->string('valorpago');
            $table->string('valortotal');
            $table->integer('stateview')->comment('0=show 1=hidden');
            $table->integer('status')->comment('0 = Ativo 1 = Inativo')->default(0);
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
