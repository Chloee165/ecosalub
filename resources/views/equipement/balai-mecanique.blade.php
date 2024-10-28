<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Balais Mécaniques" />

    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($balais as $balai)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $balai->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($balai->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image->image_path) }}" alt="Image of {{ $balai->marque }} {{ $balai->modele }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-{{ $balai->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-{{ $balai->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- Apply the same class to center marque & modele -->
                    <p class="marque-modele">{{ $balai->marque }} {{ $balai->modele }}</p>
                    <ul>
                        @if($balai->largeur_plateau_nettoyage)
                            <li><strong>Largeur du plateau de nettoyage:</strong> {{ $balai->largeur_plateau_nettoyage }}</li>
                        @endif
                        
                        @if($balai->largeur_tampons)
                            <li><strong>Largeur des tampons:</strong> {{ $balai->largeur_tampons }}</li>
                        @endif
                        
                        @if($balai->galonnage)
                            <li><strong>Galonnage:</strong> {{ $balai->galonnage }}</li>
                        @endif
                        
                        @if($balai->superficie_nettoyage)
                            <li><strong>Superficie de nettoyage:</strong> {{ $balai->superficie_nettoyage }}</li>
                        @endif
                        
                        @if($balai->description)
                            <li><strong>Description:</strong> {{ $balai->description }}</li>
                        @endif

                        @if($balai->prix)
                            <li><strong>Prix:</strong> {{ $balai->prix }} $</li>
                        @endif

                        <!-- Add documents section with updated class -->
                        @if($balai->documents->isNotEmpty())
                            <p class="p-documents"><strong>Documents:</strong></p>
                            <ul>
                                @foreach($balai->documents as $document)
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
