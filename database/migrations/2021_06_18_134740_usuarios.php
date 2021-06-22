<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('clave');
            $table->string('accessToken');
            $table->string('authKey');
            $table->string('rfc');
            $table->date('fecha_alta');
            $table->date('fecha_nacimiento');
            $table->string('usuario');
            $table->string('rol');
            $table->string('telefono');
            $table->string('celular');
            $table->string('celular_alterno');
            $table->string('email');
            $table->string('email_alternativo');
            $table->rememberToken();
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
        //
    }
}
