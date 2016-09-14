<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FileTypeTableSeeder::class);
        $this->call(AwardTypeTableSeeder::class);
        $this->call(DocumentTypeTableSeeder::class);
    }
}
