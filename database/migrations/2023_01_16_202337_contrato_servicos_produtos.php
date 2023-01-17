<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContratoServicosProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_servicoes_produtos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo')->comment('0=servico 1=produto 2=implantacao');
            $table->integer('idcontratoperiodo');
            $table->date('datareferente');
            $table->integer('pagamento')->comment('0 = Pago 1 = Sem Pagamento');
            $table->date('datapagamento');
            $table->integer('boleto')->comment('0 = ok 1 = null');
            $table->integer('nfe')->comment('0 = ok 1 = null');
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
