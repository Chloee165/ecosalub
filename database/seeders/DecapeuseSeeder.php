<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Decapeuse;
use App\Models\DecapeuseImage;
use App\Models\DecapeuseDocument;

class DecapeuseSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 6; $i++) {
            $decapeuse = Decapeuse::create([
                'marque' => 'Brand X',
                'modele' => 'Model Y',
                'largeur_plateau_nettoyage' => '65cm',
                'largeur_tampons' => '35cm',
                'galonnage' => '60L',
                'superficie_nettoyage' => '700m²',
                'description' => 'A powerful stripping machine.',
            ]);

            DecapeuseImage::create([
                'decapeuse_id' => $decapeuse->id,
                'image_path' => 'img/Récureuse-Scrubber.png',
            ]);

            DecapeuseDocument::create([
                'decapeuse_id' => $decapeuse->id,
                'document_path' => 'documents/decapeuse_manual.pdf',
            ]);
        }
    }
}
