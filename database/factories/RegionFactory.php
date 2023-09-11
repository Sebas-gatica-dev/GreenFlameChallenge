<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Regions>
 */
class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'code' => $this->faker->unique()->randomElement(['NAM', 'EMEA', 'LAC', 'APAC']),
            'name' => $this->faker->sentence,
            'display_order' => $this->faker->numberBetween(1, 4),
        ];
    }
}
