<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoDetallesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_comprobante');
            $table->date('fecha_emision');
            $table->float('subtotal');
            $table->float('iva');
            $table->float('total');
            $table->string('observacion');
            $table->string('recibidoconforme');
            $table->string('puestorecibidoconforme');
            $table->string('entregadoconforme');
            $table->string('puestoentregadoconforme');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ingreso_detalles');
    }
}
