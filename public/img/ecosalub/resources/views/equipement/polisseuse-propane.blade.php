<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Polisseuses Propane"/>

    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($polisseusesPropane as $polisseuse)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $polisseuse->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($polisseuse->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image of {{ $polisseuse->marque }} {{ $polisseuse->modele }}">
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
                    <p>{{ $polisseuse->marque }} {{ $polisseuse->modele }}</p>
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

                        <!-- Add documents section -->
                        @if($polisseuse->documents->isNotEmpty())
                            <ul>
                                @foreach($polisseuse->documents as $document)
                                    <li>
                                        <a href="{{ asset('storage/' . $document->document_path) }}" target="_blank">
                                            Documents
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
