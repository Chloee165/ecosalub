<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolisseuseBatteriesImage extends Model
{
    protected $table = 'produit_images';

    protected $fillable = ['produit_image_id', 'image_path'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
