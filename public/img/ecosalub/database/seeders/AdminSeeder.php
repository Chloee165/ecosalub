<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin user
        Admin::create([
            'prenom' => 'Ani-Pier',
            'nom' => 'Mousseau',
            'courriel' => 'apmousseau@ecosalub.ca',
            'mot_de_passe' => Hash::make('adminpassword'),
        ]);
    }
}
