<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aeropuerto;

class AeropuertoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aeropuerto = new Aeropuerto();
        $aeropuerto->nombre = 'Albacete';
        $aeropuerto->save();

        $aeropuerto2 = new Aeropuerto();
        $aeropuerto2->nombre = 'Almería';
        $aeropuerto2->save();

        $aeropuerto3 = new Aeropuerto();
        $aeropuerto3->nombre = 'Adolfo Suárez Madrid-Barajas';
        $aeropuerto3->save();

        $aeropuerto4 = new Aeropuerto();
        $aeropuerto4->nombre = 'Alicante-Elche Miguel Hernández';
        $aeropuerto4->save();
    }
}
