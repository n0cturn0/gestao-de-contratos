<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComissoesServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comissoes_servicos', function (Blueprint $table) {
            $table->id();
            $table->integer('idproduto');
            $table->integer('idservico');
            $table->string('porcentagem');
            $table->string('valorservico');
            $table->string('valorfinal');
            $table->integer('status')->comment('0 = Ativo 1 = Inativo')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.g
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comissoes_servicos');
    }
}
