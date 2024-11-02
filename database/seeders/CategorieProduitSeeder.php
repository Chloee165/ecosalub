<?php

namespace Database\Seeders;

use App\Models\CategorieProduit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["Chargeurs", "Batteries", "Pièces", "Autre"];

        CategorieProduit::factory()->create([
            "titre" => $categories[0]
        ]);

        CategorieProduit::factory()->create([
            "titre" => $categories[1]
        ]);

        CategorieProduit::factory()->create([
            "titre" => $categories[2]
        ]);

        CategorieProduit::factory()->create([
            "titre" => $categories[3]
        ]);
    }
}
