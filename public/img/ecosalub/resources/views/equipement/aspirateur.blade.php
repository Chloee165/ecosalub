<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Aspirateurs" />
    
    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($aspirateurs as $aspirateur)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $aspirateur->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($aspirateur->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image of {{ $aspirateur->marque }} {{ $aspirateur->modele }}">
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

                    <p>{{ $aspirateur->marque }} {{ $aspirateur->modele }}</p>
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

                        <!-- Add documents section -->
                        @if($aspirateur->documents->isNotEmpty())
                            <p><strong>Documents:</strong></p>
                            <ul>
                                @foreach($aspirateur->documents as $document)
                                    <li>
                                        <a href="{{ asset('storage/' . $document->document_path) }}" target="_blank">
                                            Voir le document
                                        </a>
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
