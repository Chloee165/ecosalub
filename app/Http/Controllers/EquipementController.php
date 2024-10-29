<?php

namespace App\Http\Controllers;

use App\Models\Recureuse;
use App\Models\Aspirateur;
use App\Models\BalaiMecanique;
use App\Models\Decapeuse;
use App\Models\Image;
use App\Models\Document;
use App\Models\Equipement;
use App\Models\ExtracteurTapis;
use App\Models\MachineGlaceSeche;
use App\Models\PolisseuseBatteries;
use App\Models\PolisseusePropane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class EquipementController extends Controller
{
    public function showEquipements()
    {
        return view('equipement.index');
    }

    public function showAspirateur()
    {
        $aspirateurs = Aspirateur::with(['images', 'documents'])->get();
        return view('equipement.aspirateur', compact('aspirateurs'));
    }

    public function showBalaiMecanique()
    {
        $balais = BalaiMecanique::with(['images', 'documents'])->get();
        return view('equipement.balai-mecanique', compact('balais'));
    }

    public function showDecapeuse()
    {
        $decapeuses = Decapeuse::with(['images', 'documents'])->get();
        return view('equipement.decapeuse', compact('decapeuses'));
    }

    public function showExtracteurTapis()
    {
        $extracteurs = ExtracteurTapis::with(['images', 'documents'])->get();
        return view('equipement.extracteur-tapis', compact('extracteurs'));
    }

    public function showMachineGlace()
    {
        $machinesGlaceSeche = MachineGlaceSeche::with(['images', 'documents'])->get();
        return view('equipement.machine-glace-seche', compact('machinesGlaceSeche'));
    }

    public function showPolisseuseBatteries()
    {
        $polisseusesBatteries = PolisseuseBatteries::with(['images', 'documents'])->get();
        return view('equipement.polisseuse-batteries', compact('polisseusesBatteries'));
    }

    public function showPolisseusePropane()
    {
        $polisseusesPropane = PolisseusePropane::with(['images', 'documents'])->get();
        return view('equipement.polisseuse-propane', compact('polisseusesPropane'));
    }

    public function showRecureuse()
    {
        $recureuses = Recureuse::with(['images', 'documents'])->get();
        return view('equipement.recureuse', compact('recureuses'));
    }

    /**
     * Show equipment by type
     */
    public function showEquipement($type, $id)
    {
        // Fetch the specific equipment based on the type and ID
        $equipement = null;

        switch ($type) {
            case 'aspirateur':
                $equipement = Aspirateur::with(['images', 'documents'])->findOrFail($id);
                break;
            case 'balai-mecanique':
                $equipement = BalaiMecanique::with(['images', 'documents'])->findOrFail($id);
                break;
            case 'decapeuse':
                $equipement = Decapeuse::with(['images', 'documents'])->findOrFail($id);
                break;
            case 'extracteur-tapis':
                $equipement = ExtracteurTapis::with(['images', 'documents'])->findOrFail($id);
                break;
            case 'machine-glace-seche':
                $equipement = MachineGlaceSeche::with(['images', 'documents'])->findOrFail($id);
                break;
            case 'polisseuse-batteries':
                $equipement = PolisseuseBatteries::with(['images', 'documents'])->findOrFail($id);
                break;
            case 'polisseuse-propane':
                $equipement = PolisseusePropane::with(['images', 'documents'])->findOrFail($id);
                break;
            case 'recureuse':
                $equipement = Recureuse::with(['images', 'documents'])->findOrFail($id);
                break;
            default:
                abort(404); // If type is not recognized
        }

        // Return the view for a specific equipment item
        return view('equipement.show', compact('equipement', 'type'));
    }

    /**
     * Show equipment by type for Admin
     */
    public function showEquipementAdmin($type)
    {
        // Fetch the right model based on the equipment type
        switch ($type) {
            case 'aspirateur':
                $equipements = Aspirateur::with(['images', 'documents'])->get();
                break;
            case 'balai-mecanique':
                $equipements = BalaiMecanique::with(['images', 'documents'])->get();
                break;
            case 'decapeuse':
                $equipements = Decapeuse::with(['images', 'documents'])->get();
                break;
            case 'extracteur-tapis':
                $equipements = ExtracteurTapis::with(['images', 'documents'])->get();
                break;
            case 'machine-glace-seche':
                $equipements = MachineGlaceSeche::with(['images', 'documents'])->get();
                break;
            case 'polisseuse-batteries':
                $equipements = PolisseuseBatteries::with(['images', 'documents'])->get();
                break;
            case 'polisseuse-propane':
                $equipements = PolisseusePropane::with(['images', 'documents'])->get();
                break;
            case 'recureuse':
                $equipements = Recureuse::with(['images', 'documents'])->get();
                break;
            default:
                abort(404); // If type is not recognized
        }

        // Return the same view for all types of equipment
        return view('admin.equipement.index', compact('equipements', 'type'));
    }

    public function edit($type, $id)
    {
        // Fetch the equipment model using the type and ID
        $equipement = $this->getEquipmentModel($type, $id);

        // Pass the equipment and type to the view
        return view('admin.equipement.edit', compact('equipement', 'type'));
    }

    public function update(Request $request, $type, $id)
    {
        // Fetch the specific equipment based on the type and ID
        $equipement = $this->getEquipmentModel($type, $id);

        // Validate the input fields, including file validations
        $request->validate([
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'largeur_plateau_nettoyage' => 'nullable|string|max:25',
            'largeur_tampons' => 'nullable|string|max:25',
            'galonnage' => 'nullable|string|max:25',
            'superficie_nettoyage' => 'nullable|string|max:255',
            'prix' => 'nullable|string|max:25',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Update the equipment details
        $equipement->update($request->only([
            'marque',
            'modele',
            'description',
            'largeur_plateau_nettoyage',
            'largeur_tampons',
            'galonnage',
            'superficie_nettoyage',
            'prix'
        ]));

        // Handle image deletion
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = $equipement->images()->find($imageId);
                if ($image) {
                    Storage::delete('public/' . $image->image_path);
                    $image->delete();
                }
            }
        }

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public');  // Store in 'public/images'

                // Create new Image model entry
                $equipement->images()->create([
                    'image_path' => $imagePath,
                    'alt_text' => 'Image for ' . $equipement->modele
                ]);
            }
        }

        // Handle document uploads
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                $documentPath = $document->store('documents', 'public');  // Store in 'public/documents'

                // Create new Document model entry
                $equipement->documents()->create([
                    'document_path' => $documentPath,
                    'description' => 'Document for ' . $equipement->modele
                ]);
            }
        }

        // Redirect with success message
        return redirect()->route('equipement.admin.show', ['type' => $type, 'id' => $equipement->id])
            ->with('success', 'Équipement et fichiers modifiés avec succès.');
    }

    /**
     * Destroy (delete) equipment.
     */
    public function destroy(Request $request)
    {
        // Fetch the equipment model based on the type and id
        $equipement = $this->getEquipmentModel($request->type, $request->id);

        $equipement->delete();

        // Redirect back to the equipment list with a success message
        return redirect()->route('equipement.admin.show', ['type' => $request->type])
            ->with('success', 'Équipement supprimé avec succès.');
    }

    /**
     * Get the model instance based on equipment type and ID.
     */
    private function getEquipmentModel($type, $id)
    {
        switch ($type) {
            case 'aspirateur':
                return Aspirateur::findOrFail($id);
            case 'recureuse':
                return Recureuse::findOrFail($id);
            case 'polisseuse-propane':
                return PolisseusePropane::findOrFail($id);
            case 'polisseuse-batteries':
                return PolisseuseBatteries::findOrFail($id);
            case 'balai-mecanique':
                return BalaiMecanique::findOrFail($id);
            case 'decapeuse':
                return Decapeuse::findOrFail($id);
            case 'extracteur-tapis':
                return ExtracteurTapis::findOrFail($id);
            case 'machine-glace-seche':
                return MachineGlaceSeche::findOrFail($id);
            default:
                abort(404); // If type is not recognized
        }
    }

    public function destroyImage($type, $id)
    {
        // Fetch the image by ID
        $image = Image::findOrFail($id);

        // Remove the image file from storage
        if (Storage::exists('public/' . $image->file_path)) {
            Storage::delete('public/' . $image->file_path);
        }

        // Delete the image from the database
        $image->delete();

        // Redirect back with success message
        return redirect()->route('admin.equipement', ['type' => $type, 'id' => $image->equipement_id])
            ->with('success', 'Image supprimée avec succès.');
    }

    public function destroyDocument($id)
    {
        // Fetch the document by ID
        $document = Document::findOrFail($id);

        // Remove the document file from storage
        if (Storage::exists('public/' . $document->file_path)) {
            Storage::delete('public/' . $document->file_path);
        }

        // Delete the document from the database
        $document->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Document supprimé avec succès.');
    }

    public function create($type)
    {
        // Return the view for creating a new equipment entry
        return view('admin.equipement.create', compact('type'));
    }

    public function store(Request $request, $type)
    {
        // Validate the input fields, including file validations
        $request->validate([
            'marque' => 'required|max:255',
            'modele' => 'required|max:255',
            'description' => 'nullable|max:5000',
            'largeur_plateau_nettoyage' => 'nullable|max:255',
            'largeur_tampons' => 'nullable|max:255',
            'galonnage' => 'nullable|max:255',
            'superficie_nettoyage' => 'nullable|max:255',
            'prix' => 'nullable|max:25',
            'images.*' => 'nullable|mimes:jpeg,png,jpg,gif|max:102400',
            'documents.*' => 'nullable|mimes:pdf,doc,docx|max:102400',
        ], [
            'marque.required' => "Veuillez entrer la marque de l'équipement",
            'marque.max' => "Le nom de la marque ne doit pas dépasser :max caractères",
            'modele.required' => "Veuillez entrer le modèle de l'équipement",
            'modele.max' => "Le nom du modèle ne doit pas dépasser :max caractères",
            'description.max' => "La description du produit ne doit pas dépasser :max caractères",
            'largeur_plateau_nettoyage.max' => "La largeur du plateau de nettoyage ne doit pas dépasser :max caractères",
            'largeur_tampons.max' => "La largeur des tampons ne doit pas dépasser :max caractères",
            'galonnage.max' => "Le galonnage ne doit pas dépasser :max caractères",
            'superficie_nettoyage.max' => "La superficie de nettoyage de ne doit pas dépasser :max caractères",
            'prix.max' => "Le prix ne doit pas dépasser :max caractères",
            'images.*.mimes' => "L'image doit avoir un format valide (jpeg, png, jpg, gif)",
            'images.*.max' => "La grosseur de l'image ne doit pas dépasser :max Mo",
            'documents.*.mimes' => "Le document doit avoir un format valide (pdf, doc, docx)",
            'documents.*.max' => "La grosseur du document ne doit pas dépasser :max Mo"
        ]);

        // Create a new equipment model instance based on the type
        switch ($type) {
            case 'aspirateur':
                $equipement = new Aspirateur();
                break;
            case 'balai-mecanique':
                $equipement = new BalaiMecanique();
                break;
            case 'decapeuse':
                $equipement = new Decapeuse();
                break;
            case 'extracteur-tapis':
                $equipement = new ExtracteurTapis();
                break;
            case 'machine-glace-seche':
                $equipement = new MachineGlaceSeche();
                break;
            case 'polisseuse-batteries':
                $equipement = new PolisseuseBatteries();
                break;
            case 'polisseuse-propane':
                $equipement = new PolisseusePropane();
                break;
            case 'recureuse':
                $equipement = new Recureuse();
                break;
            default:
                abort(404); // If type is not recognized
        }

        // Assign the validated values to the equipment instance
        $equipement->marque = $request->marque;
        $equipement->modele = $request->modele;
        $equipement->description = $request->description;
        $equipement->largeur_plateau_nettoyage = $request->largeur_plateau_nettoyage;
        $equipement->largeur_tampons = $request->largeur_tampons;
        $equipement->galonnage = $request->galonnage;
        $equipement->superficie_nettoyage = $request->superficie_nettoyage;
        $equipement->prix = $request->prix;

        $equipement->save();
        // Save the equipment instance to the database

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Define the target path in 'public/storage/images'
                $targetPath = public_path('storage/images');

                // Ensure the directory exists
                if (!file_exists($targetPath)) {
                    mkdir($targetPath, 0755, true);
                }

                // Move the uploaded file to 'public/storage/images'
                $imageName = $image->getClientOriginalName();
                $image->move($targetPath, $imageName);

                // Create a new Image model entry
                $equipement->images()->create([
                    'image_path' => 'storage/images/' . $imageName,
                    'alt_text' => 'Image for ' . $equipement->modele
                ]);
            }
        }

        // Handle document uploads
        if ($request->hasFile('documents')) {

            foreach ($request->file('documents') as $document) {
                // Define the target path in 'public/storage/documents'
                $targetPath = public_path('storage/documents');

                // Ensure the directory exists
                if (!file_exists($targetPath)) {
                    mkdir($targetPath, 0755, true);
                }

                // Move the uploaded file to 'public/storage/documents'
                $documentName = $document->getClientOriginalName();
                $document->move($targetPath, $documentName);

                // Create a new Document model entry
                $equipement->documents()->create([
                    'document_path' => 'storage/documents/' . $documentName,
                    'description' => 'Document for ' . $equipement->modele
                ]);
            }
        }

        // Redirect to the equipment list page with success message
        return redirect()->back()->with('success', 'Équipement ajouté avec succès.');
    }
}
