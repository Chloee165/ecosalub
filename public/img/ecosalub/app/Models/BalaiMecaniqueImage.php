<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalaiMecaniqueImage extends Model
{
    protected $fillable = ['balai_mecanique_id', 'image_path'];

    // Define the inverse relationship to BalaiMecanique
    public function balaiMecanique()
    {
        return $this->belongsTo(BalaiMecanique::class);
    }
}
