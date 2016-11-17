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
        $this->call(RoleTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(FileTypeTableSeeder::class);
        $this->call(AwardTypeTableSeeder::class);
        $this->call(DocumentTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
