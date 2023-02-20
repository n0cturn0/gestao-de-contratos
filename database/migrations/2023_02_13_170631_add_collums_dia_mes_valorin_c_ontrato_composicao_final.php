<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumsDiaMesValorinCOntratoComposicaoFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_composicao_final', function (Blueprint $table) {
            $table->dropColumn('qtdparcela');
            $table->dropColumn('valorunitario');
        });
        Schema::table('contrato_composicao_final', function (Blueprint $table) {
            $table->string('diavencimento');
            $table->string('mesvencimento');
            $table->string('valorparcela');
            $table->integer('pagamento')->comment('0 Pago 1 Não Pago')
            ->after('tipo');
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
