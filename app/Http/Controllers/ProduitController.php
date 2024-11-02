<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Affiche la liste de tous les produits
     */
    public function index(){
        return view('produit.index', [
            "produits" => Produit::all()
        ]);
    }

    /**
     * Affiche les informations d'un produit
     *
     * @param integer $id
     */
    public function show(int $id){
        return view('produit.show', [
            "produit" => Produit::findOrFail($id)
        ]);
    }

    /**
     * Affiche le formulaire pour modifier un produit
     *
     * @param integer $id
     */
    public function edit(int $id){
        return view('produit.edit', [
            'produit' => Produit::findOrFail($id)
        ]);
    }

    /**
     * Traite la modification d'un produit
     *
     * @param Request $request
     */
    public function update(Request $request){

        $valides = $request->validate([
            "titre" => "required|max:255",
            "description" => "nullable|max:1000",
            "prix" => "required|max:10",
            "categorie_produit_id" => "required"
            /* "images.*" => "nullable|mimes:jpeg,png,jpg,gif|max:102400",
            "documents.*" => "nullable|mimes:pdf,doc,docx|max:102400" */
        ], [
            "titre.required" => "Veuillez entrer le nom du produit",
            "titre.max" => "Le titre du produit ne doit pas dépasser :max caractères",
            "description.max" => "La description ne doit pas dépasser :max caractères",
            "prix.required" => "Veuillez entrer le prix du produit",
            "prix.max" => "Le prix du produit ne doit pas dépasser :max caractères",
            "categorie_produit_id.required" => "Veuillez sélectionné une catégorie de produit"
/*             "images.mimes" => "Les images doivent avoir un format valide (jpeg, png, jpg, gif",
            "images.max" => "La grosseur des images ne doit pas dépasser :max Mo",
            "documents.mimes" => "Les documents doivent avoir un format valide (pdf, doc, docx)",
            "documents.max" => "Les documents ne doivent pas dépasser :max Mo" */
        ]);

        $produit = Produit::findOrFail($valides["id"]);
        $produit->titre = $valides["titre"];
        $produit->description = $valides["description"];
        $produit->prix = $valides["prix"];
        $produit->categorie_produit_id = $valides["categorie_produit_id"];

       /*  if($request->hasFile('images')){
            Storage::putFile('public/uploads', $request->images);
            $produit
            $produit->images()->attach(ProduitImage::findOrFail($valides["images"]));
        } */

      /*   if($request->hasFile('documents')){
            Storage::putFile('public/uploads', $request->documents);
            $produit->documents
        } */
       $produit->save();

       return redirect()
            ->route('admin.produit.create')
            ->with('succes', "Un nouveau produit a été ajouté");
    }

    /**
     * Affiche le formulaire pour créer un produit
     */
    public function create(){
        return view('produit.view');
    }

    /**
     * Traite la modification d'un produit
     *
     * @param Request $request
     */
    public function store(Request $request){
        $valides = $request->validate([
            "titre" => "required|max:255",
            "description" => "nullable|max:1000",
            "prix" => "required|max:10",
            "categorie_produit_id" => "required"
            /* "images.*" => "nullable|mimes:jpeg,png,jpg,gif|max:102400",
            "documents.*" => "nullable|mimes:pdf,doc,docx|max:102400" */
        ], [
            "titre.required" => "Veuillez entrer le nom du produit",
            "titre.max" => "Le titre du produit ne doit pas dépasser :max caractères",
            "description.max" => "La description ne doit pas dépasser :max caractères",
            "prix.required" => "Veuillez entrer le prix du produit",
            "prix.max" => "Le prix du produit ne doit pas dépasser :max caractères",
            "categorie_produit_id.required" => "Veuillez sélectionné une catégorie de produit"
/*             "images.mimes" => "Les images doivent avoir un format valide (jpeg, png, jpg, gif",
            "images.max" => "La grosseur des images ne doit pas dépasser :max Mo",
            "documents.mimes" => "Les documents doivent avoir un format valide (pdf, doc, docx)",
            "documents.max" => "Les documents ne doivent pas dépasser :max Mo" */
        ]);

        $produit = new Produit();
        $produit->titre = $valides["titre"];
        $produit->description = $valides["description"];
        $produit->prix = $valides["prix"];
        $produit->categorie_produit_id = $valides["categorie_produit_id"];

       /*  if($request->hasFile('images')){
            Storage::putFile('public/uploads', $request->images);
            $produit
            $produit->images()->attach(ProduitImage::findOrFail($valides["images"]));
        } */

      /*   if($request->hasFile('documents')){
            Storage::putFile('public/uploads', $request->documents);
            $produit->documents
        } */
       $produit->save();

       return redirect()
            ->route('admin.produit.create')
            ->with('succes', "Un nouveau produit a été ajouté");
    }


}
