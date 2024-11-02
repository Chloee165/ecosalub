<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            AspirateurSeeder::class,
            BalaiMecaniqueSeeder::class,
            DecapeuseSeeder::class,
            ExtracteurTapisSeeder::class,
            MachineGlaceSecheSeeder::class,
            PolisseusePropaneSeeder::class,
            PolisseuseBatteriesSeeder::class,
            RecureuseSeeder::class,
            CategorieProduitSeeder::class,
            ProduitSeeder::class
        ]);
    }
}
