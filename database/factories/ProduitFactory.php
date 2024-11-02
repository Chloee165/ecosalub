<?php

namespace Database\Factories;

use App\Models\CategorieProduit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "titre" => fake()->word(),
            "description" => fake()->words(25, true),
            "prix" => fake()->numberBetween(300, 50000),
            "categorie_produit_id" => CategorieProduit::inRandomOrder()->first(),
            "created_at" => now(),
            "updated_at" => now()
        ];
    }
}
