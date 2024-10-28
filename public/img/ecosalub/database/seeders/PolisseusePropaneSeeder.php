<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PolisseusePropane;
use App\Models\PolisseusePropaneImage;
use App\Models\PolisseusePropaneDocument;

class PolisseusePropaneSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 6; $i++) {
            $polisseuse = PolisseusePropane::create([
                'marque' => 'Brand A',
                'modele' => 'Model Z',
                'largeur_plateau_nettoyage' => '45cm',
                'largeur_tampons' => '18cm',
                'galonnage' => '25L',
                'superficie_nettoyage' => '400m²',
                'description' => 'A powerful propane polisher.'
            ]);

            PolisseusePropaneImage::create([
                'polisseuse_propane_id' => $polisseuse->id,
                'image_path' => 'img/Récureuse-Scrubber.png',
            ]);

            PolisseusePropaneDocument::create([
                'polisseuse_propane_id' => $polisseuse->id,
                'document_path' => 'documents/polisseuse_propane_manual.pdf',
            ]);
        }
    }
}
