<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoPeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_periodos', function (Blueprint $table) {
            $table->id();
            $table->integer('idsituacao');
            $table->integer('idvendedor');
            $table->date('datainicial');
            $table->date('datafinal');
            $table->date('datareajuste');
            $table->integer('qtdparcela');
            $table->string('diavencimento');
            $table->string('valormensalidade');
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
        Schema::dropIfExists('contrato_periodos');
    }
}
