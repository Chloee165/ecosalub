<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Décapeuses"/>

    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($decapeuses as $decapeuse)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $decapeuse->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($decapeuse->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image of {{ $decapeuse->marque }} {{ $decapeuse->modele }}">
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
                    <p>{{ $decapeuse->marque }} {{ $decapeuse->modele }}</p>
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

                        <!-- Add documents section -->
                        @if($decapeuse->documents->isNotEmpty())
                            <p><strong>Documents:</strong></p>
                            <ul>
                                @foreach($decapeuse->documents as $document)
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
