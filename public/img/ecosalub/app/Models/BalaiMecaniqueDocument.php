<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalaiMecaniqueDocument extends Model
{
    use HasFactory;

    protected $fillable = ['balai_mecanique_id', 'document_path'];

    // Define the relationship with the BalaiMecanique model
    public function balaiMecanique()
    {
        return $this->belongsTo(BalaiMecanique::class);
    }
}
