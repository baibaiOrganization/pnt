<?php

use Illuminate\Database\Seeder;
use \Theater\Entities\AwardType;

class AwardTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AwardType::create([
            'id' => 1,
            'name' => 'colon',
        ]);

        AwardType::create([
            'id' => 2,
            'name' => 'semana',
        ]);
    }
}
