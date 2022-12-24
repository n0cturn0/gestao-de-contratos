<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComissaoParceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comissao_parceiros', function (Blueprint $table) {
            $table->id();
            $table->integer('idproduto');
            $table->string('porcentagem');
            $table->string('meta')->comment('Mensalidade+treinamento+implantação');
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
        Schema::dropIfExists('comissao_parceiros');
    }
}
