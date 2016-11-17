<?php

use Illuminate\Database\Seeder;
use Theater\Entities\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['id' => 1, 'name' => 'administrador']);
        Role::create(['id' => 2, 'name' => 'registrado']);
        Role::create(['id' => 3, 'name' => 'curador']);
    }
}
