<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollunIdentificaRemoveCollunIdvendedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_servicoes_produtos', function (Blueprint $table) {
            $table->integer('idativo')
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
        Schema::table('contrato_servicoes_produtos', function (Blueprint $table) {
            $table->dropColumn('idvendedor');

        });
    }
}
