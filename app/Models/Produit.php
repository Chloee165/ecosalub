<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['title', 'description', 'price', 'section'];

    use HasFactory;

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function categorie_produit()
    {
        return $this->belongsTo(CategorieProduit::class);
    }
}
