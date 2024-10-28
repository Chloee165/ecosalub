<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recureuse;
use App\Models\RecureuseImage;
use App\Models\RecureuseDocument; // Import the document model

class RecureuseSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 6; $i++) {
            $recureuse = Recureuse::create([
                'marque' => 'Brand X',
                'modele' => 'Model Y',
                'largeur_plateau_nettoyage' => '50cm',
                'largeur_tampons' => '20cm',
                'galonnage' => '30L',
                'superficie_nettoyage' => '500m²',
                'description' => 'A great cleaning machine.',
                'prix' => '00.00'
            ]);

            RecureuseImage::create([
                'recureuse_id' => $recureuse->id,
                'image_path' => 'img/Récureuse-Scrubber.png',
            ]);

            RecureuseDocument::create([
                'recureuse_id' => $recureuse->id,
                'document_path' => 'documents/recureuse_manual.pdf',
            ]);

        }
    }
}
