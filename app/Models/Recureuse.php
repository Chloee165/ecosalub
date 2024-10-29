<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RecureuseImage;
use App\Models\RecureuseDocument;

class Recureuse extends Model
{
    protected $table = 'recureuses';
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

    // Define the one-to-many relationship with RecureuseImage
    public function images()
{
    return $this->hasMany(RecureuseImage::class);
}


    // Define the one-to-many relationship with PolisseusePropaneDocument
    public function documents()
    {
        return $this->hasMany(RecureuseDocument::class);
    }
}
