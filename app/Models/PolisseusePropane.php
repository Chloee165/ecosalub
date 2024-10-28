<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PolisseusePropaneImage;
use App\Models\PolisseusePropaneDocument;

class PolisseusePropane extends Model
{
    protected $table = 'polisseuses_propanes';
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

    // Define the one-to-many relationship with PolisseusePropaneImage
    public function images()
    {
        return $this->hasMany(PolisseusePropaneImage::class);
    }

    // Define the one-to-many relationship with PolisseusePropaneDocument
    public function documents()
    {
        return $this->hasMany(PolisseusePropaneDocument::class);
    }
}
