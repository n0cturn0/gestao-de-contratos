<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdionarColunaIdcontratoComposicaoFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_composicao_final', function (Blueprint $table) {
            $table->integer('idcomposicaofinal')->comment('0 vigente 1 nao vgente')
                ->after('vendedorid');
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
