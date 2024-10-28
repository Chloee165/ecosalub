<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BalaiMecanique;
use App\Models\BalaiMecaniqueImage;
use App\Models\BalaiMecaniqueDocument;

class BalaiMecaniqueSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 6; $i++) {
            $balai = BalaiMecanique::create([
                'marque' => 'Brand X',
                'modele' => 'Model Y',
                'largeur_plateau_nettoyage' => '40cm',
                'largeur_tampons' => '20cm',
                'galonnage' => '35L',
                'superficie_nettoyage' => '450m²',
                'description' => 'Mechanical broom for fast cleaning.',
            ]);

            BalaiMecaniqueImage::create([
                'balai_mecanique_id' => $balai->id,
                'image_path' => 'img/Récureuse-Scrubber.png',
            ]);

            BalaiMecaniqueDocument::create([
                'balai_mecanique_id' => $balai->id,
                'document_path' => 'documents/balai_mecanique_manual.pdf',
            ]);
        }
    }
}

