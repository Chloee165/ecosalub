<x-admin.layout>
    <div class="admin-panel-container">
        <x-admin.sidebar />
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="admin-panel-content">
            <h2>Modifier {{ ucfirst($type) }}</h2>

            <form action="{{ route('equipement.update', ['type' => $type, 'id' => $equipement->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Marque -->
                <div class="form-group">
                    <label for="marque">Marque</label>
                    <input type="text" id="marque" name="marque" value="{{ old('marque', $equipement->marque) }}"
                        class="form-control">
                </div>

                <!-- Modèle -->
                <div class="form-group">
                    <label for="modele">Modèle</label>
                    <input type="text" id="modele" name="modele" value="{{ old('modele', $equipement->modele) }}"
                        class="form-control">
                </div>

                <!-- Largeur du plateau de nettoyage -->
                <div class="form-group">
                    <label for="largeur_plateau_nettoyage">Largeur du plateau de nettoyage</label>
                    <input type="text" id="largeur_plateau_nettoyage" name="largeur_plateau_nettoyage"
                        value="{{ old('largeur_plateau_nettoyage', $equipement->largeur_plateau_nettoyage) }}"
                        class="form-control">
                </div>

                <!-- Largeur des tampons -->
                <div class="form-group">
                    <label for="largeur_tampons">Largeur des tampons</label>
                    <input type="text" id="largeur_tampons" name="largeur_tampons"
                        value="{{ old('largeur_tampons', $equipement->largeur_tampons) }}" class="form-control">
                </div>

                <!-- Galonnage -->
                <div class="form-group">
                    <label for="galonnage">Galonnage</label>
                    <input type="text" id="galonnage" name="galonnage"
                        value="{{ old('galonnage', $equipement->galonnage) }}" class="form-control">
                </div>

                <!-- Superficie de nettoyage -->
                <div class="form-group">
                    <label for="superficie_nettoyage">Superficie de nettoyage</label>
                    <input type="text" id="superficie_nettoyage" name="superficie_nettoyage"
                        value="{{ old('superficie_nettoyage', $equipement->superficie_nettoyage) }}"
                        class="form-control">
                </div>

                <!-- Prix -->
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" id="prix" name="prix"
                        value="{{ old('prix', $equipement->prix ?? '') }}" class="form-control" maxlength="10">
                </div>
                
                <!-- Existing Images Section -->
                <div class="form-group">
                    <label>Images actuelles</label>
                    <div class="current-images">
                        @foreach ($equipement->images as $image)
                            <div class="image-item">
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                    alt="Image of {{ $equipement->marque }} {{ $equipement->modele }}"
                                    class="current-image-thumbnail">

                                <!-- Checkbox for Image Deletion -->
                                <label>
                                    <input type="checkbox" name="delete_images[]" value="{{ $image->id }}">
                                    Supprimer cette image
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Upload New Images -->
                <div class="form-group">
                    <label for="images">Télécharger une ou plusieurs nouvelles images</label>
                    <input type="file" id="images" name="images[]" multiple class="form-control">
                </div>
                <!-- Existing Documents Section -->
                <div class="form-group">
                    <label>Documents actuels</label>
                    <div class="current-documents">
                        @foreach ($equipement->documents as $document)
                            <div class="document-item">
                                <a href="{{ asset('storage/' . $document->document_path) }}" target="_blank">
                                    {{ basename($document->document_path) }}
                                </a>

                                <!-- Checkbox for Document Deletion -->
                                <label>
                                    <input type="checkbox" name="delete_documents[]" value="{{ $document->id }}">
                                    Supprimer ce document
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Upload New Documents -->
                <div class="form-group">
                    <label for="documents">Télécharger des nouveaux documents</label>
                    <input type="file" id="documents" name="documents[]" multiple class="form-control">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
</x-admin.layout>
