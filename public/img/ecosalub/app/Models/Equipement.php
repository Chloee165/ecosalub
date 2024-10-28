<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
     // Define which fields can be mass-assigned
     protected $fillable = [
        'marque',
        'modele',
        'largeur_plateau_nettoyage',
        'largeur_tampons',
        'galonnage',
        'superficie_nettoyage',
        'description',
        'images'
    ];

    // If images are stored as JSON, cast the column as an array
    protected $casts = [
        'images' => 'array'
    ];
}
