<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User;
        $user1->nombre = 'admin';
        $user1->apellido = 'admin';
        $user1->email = "admin@gmail.com";
        $user1->password = Hash::make("admin11");
        $user1->role_id = 1;
        $user1->vuelo_id = null;
        $user1->is_verified = 1;
        $user1->save();
    }
}
