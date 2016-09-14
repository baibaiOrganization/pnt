<?php

use Illuminate\Database\Seeder;
use \Theater\Entities\DocumentType;

class DocumentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentType::create([
            'id' => 1,
            'name' => 'Cedula de ciudadania',
        ]);

        DocumentType::create([
            'id' => 2,
            'name' => 'Cedula de extranjería',
        ]);

        DocumentType::create([
            'id' => 3,
            'name' => 'Pasaporte',
        ]);
    }
}
