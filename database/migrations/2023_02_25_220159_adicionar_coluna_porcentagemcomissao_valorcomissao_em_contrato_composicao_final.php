<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionarColunaPorcentagemcomissaoValorcomissaoEmContratoComposicaoFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_composicao_final', function (Blueprint $table) {
        $table->string('indicecomissao')
        ->after('valorparcela');
        });
        Schema::table('contrato_composicao_final', function (Blueprint $table) {
            $table->string('ivalorcomissao')
                ->after('indicecomissao');
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
