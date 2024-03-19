<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    $superAdminRole = Role::create(['name' => 'root', 'guard_name' => 'sanctum']);
    $adminRole = Role::create(['name' => 'administrador', 'guard_name' => 'sanctum']);
     $adminOperativoRole = Role::create(['name' => 'reportes', 'guard_name' => 'sanctum']);
    }
}
