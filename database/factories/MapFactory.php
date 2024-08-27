<?php

namespace Database\Factories;

use App\Models\Map;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MapFactory extends Factory
{
    protected $model = Map::class;

    public function definition()
    {
        return [
            'id' => (string) Str::uuid(),
            'title' => $this->faker->word,
            'url' => $this->faker->url,
            'source_id' => \App\Models\Source::factory(), 
            'active' => true,
        ];
    }
}
