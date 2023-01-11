<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumControleContratosituacao2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_situacaos', function (Blueprint $table) {
            $table->integer('controle')->comment('0 vigente 1 nao vgente')
                ->after('situacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contrato_situacaos', function (Blueprint $table) {
            //
        });
    }
}
