<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Extracteurs à tapis"/>

    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($extracteurs as $extracteur)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $extracteur->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($extracteur->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image of {{ $extracteur->marque }} {{ $extracteur->modele }}">
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
                    <p>{{ $extracteur->marque }} {{ $extracteur->modele }}</p>
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

                        <!-- Add documents section -->
                        @if($extracteur->documents->isNotEmpty())
                            <p><strong>Documents:</strong></p>
                            <ul>
                                @foreach($extracteur->documents as $document)
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
