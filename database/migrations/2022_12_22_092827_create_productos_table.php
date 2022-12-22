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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_cad');
            $table->float('precio');
            $table->string('descripcion')->nullable();
            $table->boolean('stock');
            $table->float('calorias');
            $table->float('peso');
            $table->float('hidratos');
            $table->float('azucares');
            $table->float('proteinas');
            $table->float('sal');
            $table->string('ingredientes')->nullable();
            $table->string('origen');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_marca');
            $table->foreign('id_marca')->references('id')->on('marcas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
};
