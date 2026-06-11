<?php

namespace Database\Factories;

use App\Models\Decision;
use App\Models\Factor;
use App\Models\Score;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'option_id' => Decision::factory() ,
            'factor_id' => Factor::factory() ,
            'weight' => fake()->numberBetween(1,5),
        ];
    }
}
