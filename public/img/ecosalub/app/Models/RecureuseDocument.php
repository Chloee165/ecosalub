<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecureuseDocument extends Model
{
    use HasFactory;

    protected $fillable = ['recureuse_id', 'document_path'];

    // Define the relationship with the Recureuse model
    public function recureuse()
    {
        return $this->belongsTo(Recureuse::class);
    }
}
