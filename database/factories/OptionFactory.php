<?php

namespace Database\Factories;

use App\Models\Decision;
use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Option>
 */
class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'decision_id' => Decision::factory() ,
            'title' => fake()->sentence(6,true),
        ];
    }
}
