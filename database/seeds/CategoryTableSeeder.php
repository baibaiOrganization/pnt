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
        Category::create(['name' => 'OBRA']);
        Category::create(['name' => 'DIRECTOR']);
        Category::create(['name' => 'DRAMATURGIA']);
        Category::create(['name' => 'ESCENOGRAFÍA']);
        Category::create(['name' => 'MAQUILLAJE']);
        Category::create(['name' => 'VESTUARIO']);
        Category::create(['name' => 'ILUMINACIÓN']);
        Category::create(['name' => 'SONIDO']);
        Category::create(['name' => 'ACTOR']);
        Category::create(['name' => 'ACTRÍZ']);
    }
}
