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
            <h2>Ajouter un nouvel équipement {{ ucfirst($type) }}</h2>

            <form action="{{ route('equipement.store', ['type' => $type]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Form fields -->
                <div class="form-group">
                    <label for="marque">Marque</label>
                    <input type="text" id="marque" name="marque" value="{{ old('marque') }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modele">Modèle</label>
                    <input type="text" id="modele" name="modele" value="{{ old('modele') }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="largeur_plateau_nettoyage">Largeur du plateau de nettoyage</label>
                    <input type="text" id="largeur_plateau_nettoyage" name="largeur_plateau_nettoyage" value="{{ old('largeur_plateau_nettoyage') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="largeur_tampons">Largeur des tampons</label>
                    <input type="text" id="largeur_tampons" name="largeur_tampons" value="{{ old('largeur_tampons') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="galonnage">Galonnage</label>
                    <input type="text" id="galonnage" name="galonnage" value="{{ old('galonnage') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="superficie_nettoyage">Superficie de nettoyage</label>
                    <input type="text" id="superficie_nettoyage" name="superficie_nettoyage" value="{{ old('superficie_nettoyage') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                </div>

                <!-- Image upload field -->
                <div class="form-group">
                    <label for="images">Télécharger des images</label>
                    <input type="file" id="images" name="images[]" multiple class="form-control">
                </div>

                <!-- Document upload field -->
                <div class="form-group">
                    <label for="documents">Télécharger des documents</label>
                    <input type="file" id="documents" name="documents[]" multiple class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Ajouter l'équipement</button>
            </form>
        </div>
    </div>
</x-admin.layout>
                