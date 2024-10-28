<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolisseusePropaneDocument extends Model
{
    use HasFactory;

    protected $fillable = ['polisseuse_propane_id', 'document_path'];

    // Define the relationship with the PolisseusePropane model
    public function polisseusePropane()
    {
        return $this->belongsTo(PolisseusePropane::class);
    }
}
