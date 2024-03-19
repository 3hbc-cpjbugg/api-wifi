<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = User::create([
            'name' => 'root',
            'first_surname' => 'root',
            'email' => 'root@mail.com',
            'password' => 'password' //password: password
        ]);

        $root->assignRole('Root');

        $administrator = User::create([
            'name' => 'administrador',
            'first_surname' => 'administrador',
            'email' => 'administrador@mail.com',
            'password' => 'password' //password: password
        ]);

        $administrator->assignRole('Administrador');


        $salud = User::create([
            'name' => 'Reportes',
            'first_surname' => 'reportes',
            'email' => 'reportes@mail.com',
            'password' => "password" //password: password
        ]);

        $salud->assignRole('reportes');
    }
}
