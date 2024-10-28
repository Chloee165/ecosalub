<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolisseuseBatteriesImage extends Model
{
    protected $table = 'polisseuse_batterie_images';

    protected $fillable = ['polisseuse_batterie_id', 'image_path'];

    public function polisseuseBatterie()
    {
        return $this->belongsTo(PolisseuseBatteries::class, 'polisseuse_batterie_id');
    }
}
