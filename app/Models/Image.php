<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = ['file_path', 'equipement_id', 'alt_text'];

    // Define the relationship to equipment
    public function equipement()
    {
        return $this->belongsTo(Equipement::class);
    }
    
}
