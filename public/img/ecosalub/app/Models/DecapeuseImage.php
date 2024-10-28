<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DecapeuseImage extends Model
{
    protected $fillable = ['decapeuse_id', 'image_path'];

    // Define the inverse relationship to Decapeuse
    public function decapeuse()
    {
        return $this->belongsTo(Decapeuse::class);
    }
}
