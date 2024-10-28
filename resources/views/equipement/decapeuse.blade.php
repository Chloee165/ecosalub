<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Décapeuses" />

    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($decapeuses as $decapeuse)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $decapeuse->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($decapeuse->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image->image_path) }}" alt="Image of {{ $decapeuse->marque }} {{ $decapeuse->modele }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-{{ $decapeuse->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-{{ $decapeuse->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- Apply the same class to center marque & modele -->
                    <p class="marque-modele">{{ $decapeuse->marque }} {{ $decapeuse->modele }}</p>
                    <ul>
                        @if($decapeuse->largeur_plateau_nettoyage)
                            <li><strong>Largeur du plateau de nettoyage:</strong> {{ $decapeuse->largeur_plateau_nettoyage }}</li>
                        @endif

                        @if($decapeuse->largeur_tampons)
                            <li><strong>Largeur des tampons:</strong> {{ $decapeuse->largeur_tampons }}</li>
                        @endif

                        @if($decapeuse->galonnage)
                            <li><strong>Galonnage:</strong> {{ $decapeuse->galonnage }}</li>
                        @endif

                        @if($decapeuse->superficie_nettoyage)
                            <li><strong>Superficie de nettoyage:</strong> {{ $decapeuse->superficie_nettoyage }}</li>
                        @endif

                        @if($decapeuse->description)
                            <li><strong>Description:</strong> {{ $decapeuse->description }}</li>
                        @endif

                        @if($decapeuse->prix)
                            <li><strong>Prix:</strong> {{ $decapeuse->prix }} $</li>
                        @endif

                        <!-- Add documents section with updated class -->
                        @if($decapeuse->documents->isNotEmpty())
                            <p class="p-documents"><strong>Documents:</strong></p>
                            <ul>
                                @foreach($decapeuse->documents as $document)
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
