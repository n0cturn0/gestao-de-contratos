<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrecaoColocacaoColunasContratoComposicaoFInal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_composicao_final', function (Blueprint $table) {
            $table->dropColumn('pagamento');
        });



        Schema::table('contrato_composicao_final', function (Blueprint $table) {
            $table->string('pagamento')
            ->after('valorparcela');
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
