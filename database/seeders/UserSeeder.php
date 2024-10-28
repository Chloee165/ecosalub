<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Créer un utilisateur normal
        User::create([
            'prenom' => 'John',
            'nom' => 'Doe',
            'courriel' => '1@1.com',
            'mot_de_passe' => Hash::make('password'),
        ]);

    }
}
