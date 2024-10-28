<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aspirateur;
use App\Models\AspirateurImage;
use App\Models\AspirateurDocument;

class AspirateurSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 6; $i++) {
            $aspirateur = Aspirateur::create([
                'marque' => 'Brand B',
                'modele' => 'Model X',
                'largeur_plateau_nettoyage' => '35cm',
                'largeur_tampons' => '15cm',
                'galonnage' => '20L',
                'superficie_nettoyage' => '300m²',
                'description' => 'An efficient vacuum cleaner.'
            ]);

            AspirateurImage::create([
                'aspirateur_id' => $aspirateur->id,
                'image_path' => 'img/Récureuse-Scrubber.png',
            ]);

            AspirateurDocument::create([
                'aspirateur_id' => $aspirateur->id,
                'document_path' => 'documents/aspirateur_manual.pdf',
            ]);

            AspirateurDocument::create([
                'aspirateur_id' => $aspirateur->id,
                'document_path' => 'documents/aspirateur_warranty.pdf',
            ]);
        }
    }
}

