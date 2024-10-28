<?php

namespace App\Http\Controllers;

use App\Models\Recureuse;
use App\Models\Aspirateur;
use App\Models\BalaiMecanique;
use App\Models\Decapeuse;
use App\Models\Image;
use App\Models\Document;
use App\Models\ExtracteurTapis;
use App\Models\MachineGlaceSeche;
use App\Models\PolisseuseBatteries;
use App\Models\PolisseusePropane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * Show equipment by type.
     */
    public function showEquipement($type)
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
            'largeur_plateau_nettoyage' => 'nullable|string|max:25',
            'largeur_tampons' => 'nullable|string|max:25',
            'galonnage' => 'nullable|string|max:25',
            'superficie_nettoyage' => 'nullable|string|max:25',
            'prix' => 'nullable|string|max:25',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        // Update the equipment details
        $equipement->update($request->only([
            'marque', 'modele', 'largeur_plateau_nettoyage', 
            'largeur_tampons', 'galonnage', 'superficie_nettoyage', 'prix'
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
        return redirect()->route('equipement.show', ['type' => $type])
            ->with('success', 'Équipement et fichiers modifiés avec succès.');
    }
    


    /**
     * Destroy (delete) equipment.
     */
    public function destroy($type, $id)
    {
        // Fetch the equipment model based on the type and id
        $equipement = $this->getEquipmentModel($type, $id);

        // Delete the equipment
        $equipement->delete();

        // Redirect back to the equipment list with a success message
        return redirect()->route('equipement.show', ['type' => $type])
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
        return redirect()->route('equipement.edit', ['type' => $type, 'id' => $image->equipement_id])
            ->with('success', 'Image supprimée avec succès.');
    }


    public function destroyDocument($type, $id)
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
        return redirect()->route('equipement.edit', ['type' => $type, 'id' => $document->equipement_id])
            ->with('success', 'Document supprimé avec succès.');
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
        'marque' => 'required|string|max:255',
        'modele' => 'required|string|max:255',
        'largeur_plateau_nettoyage' => 'nullable|string|max:255',
        'largeur_tampons' => 'nullable|string|max:255',
        'galonnage' => 'nullable|string|max:255',
        'superficie_nettoyage' => 'nullable|string|max:255',
        'prix' => 'nullable|string|max:25',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        'documents.*' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
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
    $equipement->largeur_plateau_nettoyage = $request->largeur_plateau_nettoyage;
    $equipement->largeur_tampons = $request->largeur_tampons;
    $equipement->galonnage = $request->galonnage;
    $equipement->superficie_nettoyage = $request->superficie_nettoyage;
    $equipement->prix = $request->prix;

    // Save the equipment instance to the database
    $equipement->save();

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

    // Redirect to the equipment list page with success message
    return redirect()->route('equipement.show', ['type' => $type, 'id' => $equipement->id])
    ->with('success', 'Équipement ajouté avec succès.');
}

}
