<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Extracteurs à tapis" />

    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($extracteurs as $extracteur)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $extracteur->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($extracteur->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image->image_path) }}" alt="Image of {{ $extracteur->marque }} {{ $extracteur->modele }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-{{ $extracteur->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-{{ $extracteur->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- Apply the same class to center marque & modele -->
                    <p class="marque-modele">{{ $extracteur->marque }} {{ $extracteur->modele }}</p>
                    <ul>
                        @if($extracteur->largeur_plateau_nettoyage)
                            <li><strong>Largeur du plateau de nettoyage:</strong> {{ $extracteur->largeur_plateau_nettoyage }}</li>
                        @endif

                        @if($extracteur->largeur_tampons)
                            <li><strong>Largeur des tampons:</strong> {{ $extracteur->largeur_tampons }}</li>
                        @endif

                        @if($extracteur->galonnage)
                            <li><strong>Galonnage:</strong> {{ $extracteur->galonnage }}</li>
                        @endif

                        @if($extracteur->superficie_nettoyage)
                            <li><strong>Superficie de nettoyage:</strong> {{ $extracteur->superficie_nettoyage }}</li>
                        @endif

                        @if($extracteur->description)
                            <li><strong>Description:</strong> {{ $extracteur->description }}</li>
                        @endif

                        @if($extracteur->prix)
                            <li><strong>Prix:</strong> {{ $extracteur->prix }} $</li>
                        @endif

                        <!-- Add documents section with updated class -->
                        @if($extracteur->documents->isNotEmpty())
                            <p class="p-documents"><strong>Documents:</strong></p>
                            <ul>
                                @foreach($extracteur->documents as $document)
                                <li>
                                    <a href="{{ asset($document->document_path) }}" target="_blank">Consulter le document</a>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </section>
</x-layout>
