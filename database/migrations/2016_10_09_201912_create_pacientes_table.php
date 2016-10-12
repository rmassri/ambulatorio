<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('cedula');
            $table->string('correo');
            $table->string('telefono');
            $table->text('direccion');
            $table->integer('usuario_ini_id');
            $table->integer('usuario_act_id');
            $table->integer('usuario_eli_id');
            $table->integer('estado_id');
            $table->integer('municipio_id');
            $table->integer('parroquia_id');
            $table->string('estatus');
            $table->timestamps();
            $table->date('fecha_eli')->nullable();
           
            
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->foreign('usuario_ini_id')->references('id')->on('users');
            $table->foreign('usuario_act_id')->references('id')->on('users');
            $table->foreign('usuario_eli_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pacientes');
    }
}
