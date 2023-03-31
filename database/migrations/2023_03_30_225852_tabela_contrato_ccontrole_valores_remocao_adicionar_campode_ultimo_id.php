<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaContratoCcontroleValoresRemocaoAdicionarCampodeUltimoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_ccontrole_valores', function (Blueprint $table) {
            $table->dropColumn('ultimoidcomposicaofinal');
        });

        Schema::table('contrato_ccontrole_valores', function (Blueprint $table) {
            $table->integer('idstatus')->default(0)
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
