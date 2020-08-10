<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiquidacionDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidacion_dias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->double('base');
            $table->double('pagos')->nullable();
            $table->double('prestamos')->nullable();
            $table->double('interes')->nullable();
            $table->double('gastos')->nullable();
            $table->double('ingreso')->nullable();
            $table->double('egreso')->nullable();
            $table->double('total')->nullable();
            $table->date('fecha');
            $table->integer('estado')->default('1');

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
        Schema::dropIfExists('liquidacion_dias');
    }
}
