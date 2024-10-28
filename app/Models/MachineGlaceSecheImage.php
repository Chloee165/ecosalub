<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MachineGlaceSecheImage extends Model
{
    protected $fillable = ['machine_glace_seche_id', 'image_path'];

    // Define the inverse relationship to MachineGlaceSeche
    public function machineGlaceSeche()
    {
        return $this->belongsTo(MachineGlaceSeche::class);
    }
}
