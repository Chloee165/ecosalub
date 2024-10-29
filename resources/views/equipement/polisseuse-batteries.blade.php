<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Polisseuses Batteries" />

    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($polisseusesBatteries as $polisseuse)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $polisseuse->id }}" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach($polisseuse->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image->image_path) }}" alt="Image of {{ $polisseuse->marque }} {{ $polisseuse->modele }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-{{ $polisseuse->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-{{ $polisseuse->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- Apply the same class to center marque & modele -->
                    <a href="{{ route('equipement.show', ['type' => 'polisseuse-batteries', 'id' => $polisseuse->id]) }}" class="marque-modele">
                    <p class="marque-modele">{{ $polisseuse->marque }} {{ $polisseuse->modele }}</p>
                    </a>
                    <ul>
                        @if($polisseuse->largeur_plateau_nettoyage)
                            <li><strong>Largeur du plateau de nettoyage:</strong> {{ $polisseuse->largeur_plateau_nettoyage }}</li>
                        @endif

                        @if($polisseuse->largeur_tampons)
                            <li><strong>Largeur des tampons:</strong> {{ $polisseuse->largeur_tampons }}</li>
                        @endif

                        @if($polisseuse->galonnage)
                            <li><strong>Galonnage:</strong> {{ $polisseuse->galonnage }}</li>
                        @endif

                        @if($polisseuse->superficie_nettoyage)
                            <li><strong>Superficie de nettoyage:</strong> {{ $polisseuse->superficie_nettoyage }}</li>
                        @endif

                        @if($polisseuse->description)
                            <li><strong>Description:</strong> {{ $polisseuse->description }}</li>
                        @endif

                        @if($polisseuse->prix)
                            <li><strong>Prix:</strong> {{ $polisseuse->prix }} $CAD</li>
                        @endif

                        <!-- Add documents section with updated class -->
                        @if($polisseuse->documents->isNotEmpty())
                            <p class="p-documents"><strong>Documents:</strong></p>
                            <ul>
                                @foreach($polisseuse->documents as $document)
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
