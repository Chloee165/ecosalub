<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtracteurTapisImage extends Model
{
    protected $fillable = ['extracteur_tapis_id', 'image_path'];

    // Define the inverse relationship to ExtracteurTapis
    public function extracteurTapis()
    {
        return $this->belongsTo(ExtracteurTapis::class);
    }
}
