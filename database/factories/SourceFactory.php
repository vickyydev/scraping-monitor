<?php

namespace Database\Factories;

use App\Models\Source;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SourceFactory extends Factory
{
    protected $model = Source::class;

    public function definition()
    {
        return [
            'id' => (string) Str::uuid(),
            'title' => $this->faker->company,
            'url' => $this->faker->url,
            'active' => true,
        ];
    }
}
