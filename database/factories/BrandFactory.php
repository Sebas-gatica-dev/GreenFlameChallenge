<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brands>
 */
class BrandFactory extends Factory
{
    
     protected $model = Brand::class;

    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numberBetween(1, 100), // Valores únicos para cada registro
            'name' => $this->faker->word,
            'display_order' => $this->faker->numberBetween(10, 30),
            'active' => 1, // Valor fijo de 1 para activo
        ];
    }
}
