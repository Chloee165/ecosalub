<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieProduit extends Model
{
    use HasFactory;

    /**
     * Relation plusieurs-à-un avec la table Produit
     */
    public function produits(){
        return $this->hasMany(Produit::class);
    }
}
