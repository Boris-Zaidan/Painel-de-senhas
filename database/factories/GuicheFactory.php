<?php

namespace Database\Factories;

use App\Models\Guiche;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Guiche>
 */
class GuicheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => 'Guichê ' . fake()->unique()->numberBetween(1, 10),
        ];
    }
}
