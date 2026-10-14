<?php

namespace Database\Factories;

use App\Models\Especialidade;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),

            'crm' => fake()->unique()->numerify('CRM-######'),

            'especialidade_id' => Especialidade::query()
                ->inRandomOrder()
                ->value('id'),

        ];
    }
}
