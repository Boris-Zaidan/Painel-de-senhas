<?php

namespace Database\Seeders;

use App\Models\Atendente;
use App\Models\Guiche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtendenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guiches = Guiche::all();

        Atendente::factory()
            ->count(10)
            ->recycle($guiches)
            ->create();
    }
}
