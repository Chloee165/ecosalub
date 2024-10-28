<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolisseusePropaneImage extends Model
{
    protected $fillable = ['polisseuse_propane_id', 'image_path'];

    // Define the inverse relationship to PolisseusePropane
    public function polisseusePropane()
    {
        return $this->belongsTo(PolisseusePropane::class);
    }
}
