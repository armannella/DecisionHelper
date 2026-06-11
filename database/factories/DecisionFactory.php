<?php

namespace Database\Factories;

use App\DecisionType;
use App\Models\Decision;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Decision>
 */
class DecisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory() ,
            'title' => fake()->sentence(6,true),
            "type" => fake()->randomElement(DecisionType::cases())



        ];
    }
}
