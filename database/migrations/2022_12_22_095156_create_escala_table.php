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
        Schema::create('escala', function (Blueprint $table) {
            $table->unsignedBigInteger('id_aeropuerto');
            $table->foreign('id_aeropuerto')->references('id')->on('aeropuertos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_vuelo');
            $table->foreign('id_vuelo')->references('id')->on('vuelos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('escala');
    }
};
