<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineGlaceSecheDocument extends Model
{
    use HasFactory;

    protected $fillable = ['machine_glace_seche_id', 'document_path'];

    // Define the relationship with the MachineGlaceSeche model
    public function machineGlaceSeche()
    {
        return $this->belongsTo(MachineGlaceSeche::class);
    }
}
