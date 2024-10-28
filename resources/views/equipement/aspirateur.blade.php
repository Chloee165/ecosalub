<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Aspirateurs" />
    
    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($aspirateurs as $aspirateur)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $aspirateur->id }}" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach($aspirateur->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image->image_path) }}" alt="Image of {{ $aspirateur->marque }} {{ $aspirateur->modele }}">
                                </div>
                            @endforeach
                        </div>
                        
                        <a class="carousel-control-prev" href="#carousel-{{ $aspirateur->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-{{ $aspirateur->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <!-- Apply the same class to center marque & modele -->
                    <p class="marque-modele">{{ $aspirateur->marque }} {{ $aspirateur->modele }}</p>
                    <ul>
                        @if($aspirateur->largeur_plateau_nettoyage)
                            <li><strong>Largeur du plateau de nettoyage:</strong> {{ $aspirateur->largeur_plateau_nettoyage }}</li>
                        @endif
                        
                        @if($aspirateur->largeur_tampons)
                            <li><strong>Largeur des tampons:</strong> {{ $aspirateur->largeur_tampons }}</li>
                        @endif
                        
                        @if($aspirateur->galonnage)
                            <li><strong>Galonnage:</strong> {{ $aspirateur->galonnage }}</li>
                        @endif
                        
                        @if($aspirateur->superficie_nettoyage)
                            <li><strong>Superficie de nettoyage:</strong> {{ $aspirateur->superficie_nettoyage }}</li>
                        @endif
                        
                        @if($aspirateur->description)
                            <li><strong>Description:</strong> {{ $aspirateur->description }}</li>
                        @endif

                        @if($aspirateur->prix)
                            <li><strong>Prix:</strong> {{ $aspirateur->prix }} $CAD</li>
                        @endif

                        <!-- Add documents section with updated class -->
                        @if($aspirateur->documents->isNotEmpty())
                            <p class="p-documents"><strong>Documents:</strong></p>
                            <ul>
                                @foreach($aspirateur->documents as $document)
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
