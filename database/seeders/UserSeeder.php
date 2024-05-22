<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new User;
        $user1->name = 'Administrador';
        $user1->email = 'administrador@prueba.com';
        $user1->password = bcrypt('administrador');
        $user1->save();

        // Crear el segundo usuario
        $user2 = new User;
        $user2->name = 'Usuario';
        $user2->email = 'usuario@prueba.com';
        $user2->password = bcrypt('usuario');
        $user2->save();

        $user3 = new User;
        $user3->name = 'Usuario';
        $user3->email = 'cristhianjhair06@gmail.com';
        $user3->password = bcrypt('admin');
        $user3->save();
    }
}
