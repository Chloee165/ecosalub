<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecureuseImage extends Model
{
    protected $fillable = ['recureuse_id', 'image_path'];

    // Define the inverse of the relationship to Recureuse
    public function recureuse()
    {
        return $this->belongsTo(Recureuse::class);
    }
}
