<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtracteurTapisDocument extends Model
{
    use HasFactory;

    protected $fillable = ['extracteur_tapis_id', 'document_path'];

    // Define the relationship with the ExtracteurTapis model
    public function extracteurTapis()
    {
        return $this->belongsTo(ExtracteurTapis::class);
    }
}
