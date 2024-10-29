<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DecapeuseImage;
use App\Models\DecapeuseDocument;

class Decapeuse extends Model
{
    protected $table = 'decapeuses';
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

    // Define the one-to-many relationship with DecapeuseImage
    public function images()
    {
        return $this->hasMany(DecapeuseImage::class);
    }

    // Define the one-to-many relationship with DecapeuseDocument
    public function documents()
    {
        return $this->hasMany(DecapeuseDocument::class);
    }
}
