<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('cedula');
            $table->text('direccion');
            $table->string('estatus');
            $table->date('fecha');
            $table->string('correo');
            $table->string('password');
            $table->string('ip');
            $table->string('telefono_local');
            $table->string('telefono_celular');
            $table->integer('grupo_id');
            $table->integer('estado_id');
            $table->timestamps();
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->foreign('estado_id')->references('id')->on('estados');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
