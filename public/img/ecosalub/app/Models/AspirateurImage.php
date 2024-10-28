<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspirateurImage extends Model
{
    protected $fillable = ['aspirateur_id', 'image_path'];

    // Define the inverse relationship to Aspirateur
    public function aspirateur()
    {
        return $this->belongsTo(Aspirateur::class);
    }
}
