<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Source;

class SourceSeeder extends Seeder
{
    public function run()
    {
        Source::factory(10)->create();
    }
}
