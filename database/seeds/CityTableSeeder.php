<?php

use Illuminate\Database\Seeder;
use Theater\Entities\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create(['name' => 'Bogotá', 'region_id' => 2]);
        City::create(['name' => 'Medellín', 'region_id' => 3]);

        City::create(['name' => 'Cali', 'region_id' => 4]);
        City::create(['name' => 'Valle', 'region_id' => 4]);
        City::create(['name' => 'Cauca', 'region_id' => 4]);
        City::create(['name' => 'Huila', 'region_id' => 4]);
        City::create(['name' => 'Tolima', 'region_id' => 4]);
        City::create(['name' => 'Chocó', 'region_id' => 4]);
        City::create(['name' => 'Nariño', 'region_id' => 4]);
        City::create(['name' => 'Amazonas', 'region_id' => 4]);

        City::create(['name' => 'Manizales', 'region_id' => 5]);
        City::create(['name' => 'Risaralda', 'region_id' => 5]);
        City::create(['name' => 'Caldas', 'region_id' => 5]);
        City::create(['name' => 'Quindío', 'region_id' => 5]);

        City::create(['name' => 'Barranquilla', 'region_id' => 6]);
        City::create(['name' => 'Atlántico', 'region_id' => 6]);
        City::create(['name' => 'Bolívar', 'region_id' => 6]);
        City::create(['name' => 'Magdalena', 'region_id' => 6]);
        City::create(['name' => 'Sucre', 'region_id' => 6]);
        City::create(['name' => 'Córdoba', 'region_id' => 6]);
        City::create(['name' => 'Guajira', 'region_id' => 6]);
        City::create(['name' => 'Cesar', 'region_id' => 6]);
        City::create(['name' => 'San Andrés y Providencia', 'region_id' => 6]);

        City::create(['name' => 'Bucaramanga', 'region_id' => 7]);
        City::create(['name' => 'Santander', 'region_id' => 7]);
        City::create(['name' => 'Casanare', 'region_id' => 7]);
        City::create(['name' => 'Norte de Santander', 'region_id' => 7]);
        City::create(['name' => 'Boyacá', 'region_id' => 7]);
        City::create(['name' => 'Arauca', 'region_id' => 7]);
        City::create(['name' => 'Vichada', 'region_id' => 7]);
        City::create(['name' => 'Guainía', 'region_id' => 7]);
        City::create(['name' => 'Meta', 'region_id' => 7]);
        City::create(['name' => 'Vaupés', 'region_id' => 7]);
        City::create(['name' => 'Guaviare', 'region_id' => 7]);
    }
}
