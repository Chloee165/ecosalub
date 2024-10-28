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
            <!-- Content goes here -->
            <section class="admin-equipment-list">
                <div id="liste-equipment-title">
                    <h2>Liste des {{ ucfirst($type) }}s</h2>

                    <!-- Add New Equipment Button -->
                    <a href="{{ route('equipement.create', ['type' => $type]) }}" class="btn-bleu">
                        Ajouter
                    </a>
                </div>
                @if ($equipements->isEmpty())
                    <p>Aucun équipement trouvé.</p>
                @else
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Largeur du plateau</th>
                                <th>Largeur des tampons</th>
                                <th>Galonnage</th>
                                <th>Superficie de nettoyage</th>
                                <th>Prix</th> <!-- New Price Column -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipements as $equipement)
                                <tr>
                                    <td>{{ $equipement->marque }}</td>
                                    <td>{{ $equipement->modele }}</td>
                                    <td>{{ $equipement->largeur_plateau_nettoyage ?? 'N/A' }}</td>
                                    <td>{{ $equipement->largeur_tampons ?? 'N/A' }}</td>
                                    <td>{{ $equipement->galonnage ?? 'N/A' }}</td>
                                    <td>{{ $equipement->superficie_nettoyage ?? 'N/A' }}</td>
                                    <td>{{ $equipement->prix ?? 'N/A' }}</td> <!-- Displaying Price -->
                                    <td>
                                        <a href="{{ route('equipement.edit', ['type' => $type, 'id' => $equipement->id]) }}"
                                            class="btn btn-primary btn-sm">Modifier</a>

                                        <form
                                            action="{{ route('equipement.destroy', ['type' => $type, 'id' => $equipement->id]) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet équipement ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </section>
        </div>
    </div>
</x-admin.layout>
