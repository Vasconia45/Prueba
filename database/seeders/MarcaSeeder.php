<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $marca = new Marca();
        $marca->nombre = 'CocaCola';
        $marca->save();
        
        $marca1 = new Marca();
        $marca1->nombre = 'Danone';
        $marca1->save();

        $marca2 = new Marca();
        $marca2->nombre = 'Pepsi';
        $marca2->save();
    }
}
