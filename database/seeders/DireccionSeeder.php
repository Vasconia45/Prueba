<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Direccione;

class DireccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $direccion = new Direccione();
        $direccion->municipio = 'Donostia';
        $direccion->calle = 'Fuenterrabia';
        $direccion->puerta = 33;
        $direccion->piso = '6D';
        $direccion->save();

        $direccion2 = new Direccione();
        $direccion2->municipio = 'Donostia';
        $direccion2->calle = 'Sancho El Sabio';
        $direccion2->puerta = 15;
        $direccion2->piso = '3A';
        $direccion2->save();
    }
}
