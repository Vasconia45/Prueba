<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('contraseña');
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_direccion')->unique()->nullable();
            $table->foreign('id_direccion')->references('id')->on('direcciones')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_vuelo')->unique()->nullable();
            $table->foreign('id_vuelo')->references('id')->on('vuelos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('usuarios');
    }
};
