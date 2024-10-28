<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Récureuses" />
    
    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($recureuses as $recureuse)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $recureuse->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            
                            @foreach($recureuse->images as $index => $image)

                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    {{-- @dd($image) --}}
                                    <img src="{{ asset($image->image_path) }}" alt="Image of {{ $recureuse->marque }} {{ $recureuse->modele }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-{{ $recureuse->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-{{ $recureuse->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <p class="marque-modele">{{ $recureuse->marque }} {{ $recureuse->modele }}</p>
                    <ul>
                        @if($recureuse->largeur_plateau_nettoyage)
                            <li><strong>Largeur du plateau de nettoyage:</strong> {{ $recureuse->largeur_plateau_nettoyage }}</li>
                        @endif

                        @if($recureuse->largeur_tampons)
                            <li><strong>Largeur des tampons:</strong> {{ $recureuse->largeur_tampons }}</li>
                        @endif

                        @if($recureuse->galonnage)
                            <li><strong>Galonnage:</strong> {{ $recureuse->galonnage }}</li>
                        @endif

                        @if($recureuse->superficie_nettoyage)
                            <li><strong>Superficie de nettoyage:</strong> {{ $recureuse->superficie_nettoyage }}</li>
                        @endif

                        @if($recureuse->description)
                            <li><strong>Description:</strong> {{ $recureuse->description }}</li>
                        @endif

                        @if($recureuse->prix)
                        <li><strong>Prix:</strong> {{ $recureuse->prix }} $</li>
                        @endif

                        <!-- Add documents section -->
                        @if($recureuse->documents->isNotEmpty())
                            <p class="p-documents"><strong>Documents:</strong></p>
                            <ul>
                                @foreach($recureuse->documents as $document)
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
