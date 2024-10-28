<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PolisseuseBatteries;
use App\Models\PolisseuseBatteriesImage;
use App\Models\PolisseuseBatteriesDocument;

class PolisseuseBatteriesSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            // Create a PolisseuseBatteries entry
            $polisseuse = PolisseuseBatteries::create([
                'marque' => 'Brand ' . $i,
                'modele' => 'Model ' . $i,
                'largeur_plateau_nettoyage' => '35cm',
                'largeur_tampons' => '15cm',
                'galonnage' => '20L',
                'superficie_nettoyage' => '300m²',
                'description' => 'An efficient battery-powered polisher.',
            ]);

            // Create a related image entry
            PolisseuseBatteriesImage::create([
                'polisseuse_batterie_id' => $polisseuse->id,
                'image_path' => 'img/Polisseuse-Burnicher_batterie.png',
            ]);

            // Create a related document entry
            PolisseuseBatteriesDocument::create([
                'polisseuse_batterie_id' => $polisseuse->id,
                'document_path' => 'documents/polisseuse_manual_' . $i . '.pdf',
            ]);
        }
    }
}
