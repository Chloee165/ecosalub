<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BalaiMecaniqueImage;
use App\Models\BalaiMecaniqueDocument;

class BalaiMecanique extends Model
{
    protected $table = 'balais_mecaniques';
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

    // Define the one-to-many relationship with BalaiMecaniqueImage
    public function images()
    {
        return $this->hasMany(BalaiMecaniqueImage::class);
    }

    // Define the one-to-many relationship with BalaiMecaniqueDocument
    public function documents()
    {
        return $this->hasMany(BalaiMecaniqueDocument::class);
    }
}
