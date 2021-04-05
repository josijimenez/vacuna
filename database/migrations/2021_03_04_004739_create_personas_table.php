<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('institucion');
            $table->string('consta_lista');
            $table->string('eod');
            $table->string('cedula');
            $table->string('nombres');
            $table->string('regimen_laboral');
            $table->string('modalidad_laboral');
            $table->string('tipo_nombramiento');
            $table->string('unidad_operativa');
            $table->string('area');
            $table->string('denominacion_puesto');
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('gestacion');
            $table->string('maternidad');
            $table->string('lactancia');
            $table->string('enfermedad_catastrofica');
            $table->string('tipo');
            $table->string('discapacidad');
            $table->string('cambio_administrativo');
            $table->string('area_labora');
            $table->string('nivel_ocupacional');
            $table->string('covid');
            $table->string('acepta_vacuna');
            $table->string('usuario_digitador');
            $table->string('puesto_vacunacion');
            $table->date('primera_dosis_fecha');
            $table->time('primera_dosis_hora');
            $table->string('primera_equipo_vacunador');
            $table->string('primera_dosis_vacunado');
            $table->text('primera_dosis_observacion');
            $table->date('segunda_dosis_fecha');
            $table->time('segunda_dosis_hora');
            $table->string('segunda_equipo_vacunador');
            $table->string('segunda_dosis_vacunado');
            $table->text('segunda_dosis_observacion');
            $table->text('observacion');
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
        Schema::drop('personas');
    }
}
