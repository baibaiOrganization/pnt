<?php

use Illuminate\Database\Seeder;
use Theater\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'administrador',
            'email' => 'juan2ramos@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => 1,
            'region_id' => 1
        ]);

        User::create([
            'name' => 'Sandro Romero',
            'email' => 'sandro.romero@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 2
        ]);

        User::create([
            'name' => 'Sergio Restrepo',
            'email' => 'sergio.restrepo@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 3
        ]);

        User::create([
            'name' => 'Carlos Enrique Lozano',
            'email' => 'carlos.lozano@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 4
        ]);

        User::create([
            'name' => 'Julian Arbeláez',
            'email' => 'julian.arbelaez@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 5
        ]);

        User::create([
            'name' => 'Nubia Florez',
            'email' => 'nubia.florez@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 6
        ]);

        User::create([
            'name' => 'Sandra Barrero',
            'email' => 'sandra.barrero@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 7
        ]);
    }
}
