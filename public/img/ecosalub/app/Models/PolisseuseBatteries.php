<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolisseuseBatteries extends Model
{
    protected $table = 'polisseuses_batteries'; 

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

    public function images()
    {
        return $this->hasMany(PolisseuseBatteriesImage::class, 'polisseuse_batterie_id');
    }
    
    public function documents()
    {
        return $this->hasMany(PolisseuseBatteriesDocument::class, 'polisseuse_batterie_id');
    }
}
