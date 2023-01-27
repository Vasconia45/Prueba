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
            $table->unsignedBigInteger('aeropuerto_id');
            $table->foreign('aeropuerto_id')->references('id')->on('aeropuertos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('vuelo_id');
            $table->foreign('vuelo_id')->references('id')->on('vuelos')->onUpdate('cascade')->onDelete('cascade');
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
