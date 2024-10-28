<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspirateurDocument extends Model
{
    use HasFactory;

    protected $fillable = ['aspirateur_id', 'document_path'];

    // Define the relationship with the Aspirateur model
    public function aspirateur()
    {
        return $this->belongsTo(Aspirateur::class);
    }
}
