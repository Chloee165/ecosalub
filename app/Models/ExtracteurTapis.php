<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ExtracteurTapisImage;
use App\Models\ExtracteurTapisDocument;

class ExtracteurTapis extends Model
{
    protected $table = 'extracteur_tapis';
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

    // Define the one-to-many relationship with ExtracteurTapisImage
    public function images()
    {
        return $this->hasMany(ExtracteurTapisImage::class);
    }

    // Define the one-to-many relationship with ExtracteurTapisDocument
    public function documents()
    {
        return $this->hasMany(ExtracteurTapisDocument::class);
    }
}
