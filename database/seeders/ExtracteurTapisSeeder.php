<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExtracteurTapis;
use App\Models\ExtracteurTapisImage;
use App\Models\ExtracteurTapisDocument;

class ExtracteurTapisSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 6; $i++) {
            $extracteurTapis = ExtracteurTapis::create([
                'marque' => 'Brand C',
                'modele' => 'Model W',
                'largeur_plateau_nettoyage' => '60cm',
                'largeur_tampons' => '25cm',
                'galonnage' => '40L',
                'superficie_nettoyage' => '600m²',
                'description' => 'A top-of-the-line carpet extractor.'
            ]);

            ExtracteurTapisImage::create([
                'extracteur_tapis_id' => $extracteurTapis->id,
                'image_path' => 'img/Récureuse-Scrubber.png',
            ]);

            ExtracteurTapisDocument::create([
                'extracteur_tapis_id' => $extracteurTapis->id,
                'document_path' => 'documents/extracteur_tapis_manual.pdf',
            ]);
        }
    }
}
