<?php

namespace Database\Seeders;

use App\Models\Especialidade;
use Illuminate\Database\Seeder;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = [
            'Cardiologia',
            'Clínica Geral',
            'Dermatologia',
            'Ortopedia',
            'Pediatria',
            'Neurologia',
            'Ginecologia',
            'Oftalmologia',
            'Psiquiatria',
            'Urologia',
        ];

        foreach ($especialidades as $nome) {
            Especialidade::firstOrCreate([
                'nome' => $nome,
            ]);
        }
    }
}
