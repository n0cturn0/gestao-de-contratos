<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImplantacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('implantacaos', function (Blueprint $table) {
            $table->id();
            $table->integer('idCliente');
            $table->integer('idProduto');
            $table->integer('idVendedor');
            $table->string('valorImplantacao');
            $table->integer('qtdparcelas');
            $table->string('valorParcela');
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
        Schema::dropIfExists('implantacaos');
    }
}
