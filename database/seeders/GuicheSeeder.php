<?php

namespace Database\Seeders;

use App\Models\Guiche;
use Database\Factories\GuicheFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuicheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guiche::factory()->count(5)->create();
    }
}
