<?php

use Illuminate\Database\Seeder;
use Theater\Entities\Region;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create(['id' => 1,'name' => 'Sin Región']);
        Region::create(['id' => 2,'name' => 'Cundinamarca']);
        Region::create(['id' => 3,'name' => 'Antioquia']);
        Region::create(['id' => 4,'name' => 'Sur y Occidente']);
        Region::create(['id' => 5,'name' => 'Eje Cafetero']);
        Region::create(['id' => 6,'name' => 'Caribe']);
        Region::create(['id' => 7,'name' => 'Nororiente']);
    }
}
