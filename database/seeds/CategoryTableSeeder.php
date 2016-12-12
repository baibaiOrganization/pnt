<?php

use Illuminate\Database\Seeder;
use Theater\Entities\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'MEJOR OBRA']);
        Category::create(['name' => 'MEJOR DIRECTOR']);
        Category::create(['name' => 'MEJOR DRAMATURGIA']);
        Category::create(['name' => 'MEJOR DISEÑO DE ESCENOGRAFÍA']);
        Category::create(['name' => 'MEJOR DISEÑO DE MAQUILLAJE']);
        Category::create(['name' => 'MEJOR DISEÑO DE VESTUARIO']);
        Category::create(['name' => 'MEJOR DISEÑO DE ILUMINACIÓN']);
        Category::create(['name' => 'MEJOR DISEÑO DE SONIDO']);
        Category::create(['name' => 'MEJOR ACTOR']);
        Category::create(['name' => 'MEJOR ACTRÍZ']);
    }
}
