<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    // This method will return the inConstruction view
    public function showConstruction()
    {
        return view('inConstruction');
    }
}