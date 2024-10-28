<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MachineGlaceSeche;
use App\Models\MachineGlaceSecheImage;
use App\Models\MachineGlaceSecheDocument;

class MachineGlaceSecheSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 6; $i++) {
            $machine = MachineGlaceSeche::create([
                'marque' => 'Brand X',
                'modele' => 'Model Y',
                'largeur_plateau_nettoyage' => '55cm',
                'largeur_tampons' => '22cm',
                'galonnage' => '25L',
                'superficie_nettoyage' => '550m²',
                'description' => 'Dry ice machine for industrial cleaning.',
            ]);

            MachineGlaceSecheImage::create([
                'machine_glace_seche_id' => $machine->id,
                'image_path' => 'img/Récureuse-Scrubber.png',
            ]);

            MachineGlaceSecheDocument::create([
                'machine_glace_seche_id' => $machine->id,
                'document_path' => 'documents/machine_glace_seche_manual.pdf',
            ]);
        }
    }
}
