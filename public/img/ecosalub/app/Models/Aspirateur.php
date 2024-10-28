<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AspirateurImage;
use App\Models\AspirateurDocument;

class Aspirateur extends Model
{
    protected $table = 'aspirateurs';
    protected $fillable = [
        'marque', 
        'modele', 
        'largeur_plateau_nettoyage', 
        'largeur_tampons', 
        'galonnage', 
        'superficie_nettoyage', 
        'description',
        'prix'
    ];

    // Define the one-to-many relationship with AspirateurImage
    public function images()
    {
        return $this->hasMany(AspirateurImage::class);
    }

    // Define the one-to-many relationship with AspirateurDocument
    public function documents()
    {
        return $this->hasMany(AspirateurDocument::class);
    }
}
