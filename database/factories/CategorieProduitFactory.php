<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategorieProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ["Chargeurs", "Batteries", "Pièces", "Autre"];

        $index = array_rand($categories);

        $categorie_aleatoire = $categories[$index];

        return [
            "titre" => $categorie_aleatoire
        ];
    }
}
