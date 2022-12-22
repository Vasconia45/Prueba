<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.-
     * @return void
     */
    public function run()
    {
        $producto = new Producto();
        $producto->nombre = 'Chocolate negro 70%';
        $producto->fecha_cad = '20/10/2023';
        $producto->precio = 5;
        $producto->descripcion = 'Este chocolate es 70% puro.';
        $producto->stock = true;
        $producto->calorias = 132.5;
        $producto->peso = 100;
        $producto->hidratos = 50;
        $producto->azucares = 12.3;
        $producto->proteinas = 10.2;
        $producto->sal = 3.7;
        $producto->ingredientes = 'Cacao-Leche-Pepas';
        $producto->origen = 'África';
        $producto->id_categoria = 1;
        $producto->id_marca = 2;
        $producto->save();
    }
}
