<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitDocument extends Model
{
    use HasFactory;

    protected $fillable = ['produit_id', 'document_path'];

    // Define the relationship with the PolisseusePropane model
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
