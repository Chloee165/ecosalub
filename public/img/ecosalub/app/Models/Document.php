<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = ['file_path', 'equipement_id', 'type'];

    // Define the relationship to equipment
    public function equipement()
    {
        return $this->belongsTo(Equipement::class);
    }
}
