<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrecaoColunaIdcontratoComposicaoFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_composicao_final', function (Blueprint $table) {
            $table->dropColumn('idcomposicaofinal');
        });
        Schema::table('contrato_ccontrole_valores', function (Blueprint $table) {
            $table->integer('ultimoidcomposicaofinal')->comment('0 vigente 1 nao vgente')
                ->after('idcomposicao');
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
