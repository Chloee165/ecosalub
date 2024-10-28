<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecapeuseDocument extends Model
{
    use HasFactory;

    protected $fillable = ['decapeuse_id', 'document_path'];

    // Define the relationship with the Decapeuse model
    public function decapeuse()
    {
        return $this->belongsTo(Decapeuse::class);
    }
}
