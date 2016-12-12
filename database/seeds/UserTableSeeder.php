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
        
        /******* Administrador *******/
        
        User::create([
            'name' => 'administrador',
            'email' => 'juan2ramos@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => 1,
            'region_id' => 1
        ]);
        
        /********* Curadores *********/
        
        User::create([
            'name' => 'Curador Cundinamarca Principal',
            'email' => 'curador-cundinamarca@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 2
        ]);

        User::create([
            'name' => 'Curador Cundinamarca Generico 1',
            'email' => 'cundinamarca1@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 4,
            'region_id' => 2
        ]);

        User::create([
            'name' => 'Curador Cundinamarca Generico 2',
            'email' => 'cundinamarca2@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 4,
            'region_id' => 2
        ]);

        User::create([
            'name' => 'Curador Antioquia',
            'email' => 'curador-antioquia@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 3
        ]);

        User::create([
            'name' => 'Curador Sur y Occidente',
            'email' => 'curador-sur-y-occidente@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 4
        ]);

        User::create([
            'name' => 'Curador Eje Cafetero',
            'email' => 'curador-eje-cafetero@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 5
        ]);

        User::create([
            'name' => 'Curador Caribe',
            'email' => 'curador-caribe@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 6
        ]);

        User::create([
            'name' => 'Curador Nororiente',
            'email' => 'curador-nororiente@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 3,
            'region_id' => 7
        ]);
        
        /************ Jueces ************/

        User::create([
            'name' => 'Juez 1',
            'email' => 'juez1@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 5,
            'region_id' => 1
        ]);

        User::create([
            'name' => 'Juez 2',
            'email' => 'juez2@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 5,
            'region_id' => 1
        ]);

        User::create([
            'name' => 'Juez 3',
            'email' => 'juez3@pnt.com',
            'password' => bcrypt('12345'),
            'role_id' => 5,
            'region_id' => 1
        ]);
    }
}
