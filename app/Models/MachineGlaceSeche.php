<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MachineGlaceSecheImage;
use App\Models\MachineGlaceSecheDocument;

class MachineGlaceSeche extends Model
{
    protected $table = 'machines_glace_seche';
    protected $fillable = [
        'marque', 
        'modele', 
        'description',
        'largeur_plateau_nettoyage', 
        'largeur_tampons', 
        'galonnage', 
        'superficie_nettoyage', 
        'prix'
    ];

    // Define the one-to-many relationship with MachineGlaceSecheImage
    public function images()
    {
        return $this->hasMany(MachineGlaceSecheImage::class);
    }

    // Define the one-to-many relationship with MachineGlaceSecheDocument
    public function documents()
    {
        return $this->hasMany(MachineGlaceSecheDocument::class);
    }
}
