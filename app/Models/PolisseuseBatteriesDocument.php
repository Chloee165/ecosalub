<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolisseuseBatteriesDocument extends Model
{
    use HasFactory;

    protected $table = 'polisseuse_batterie_documents';
    protected $fillable = ['polisseuse_batteries_id', 'document_path'];

    // Define the relationship with the PolisseuseBatteries model
    public function polisseuseBatteries()
    {
        return $this->belongsTo(PolisseuseBatteries::class);
    }
}
