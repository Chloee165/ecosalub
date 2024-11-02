<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VuesController extends Controller
{
    // This method will return the inConstruction view
    public function showEntreprise()
    {
        return view('entreprise', [
            "produits" => Produit::all()
        ]);
    }

}
