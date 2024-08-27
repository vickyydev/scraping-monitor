<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Map;

class MapSeeder extends Seeder
{
    public function run()
    {
        Map::factory(10)->create();
    }
}
