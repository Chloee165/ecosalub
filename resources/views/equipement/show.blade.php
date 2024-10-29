<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Détails de l'équipement" />

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <!-- Image Carousel -->
                <div id="carousel-{{ $equipement->id }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($equipement->images as $index => $image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset($image->image_path) }}" class="d-block w-100" alt="Image of {{ $equipement->marque }} {{ $equipement->modele }}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel-{{ $equipement->id }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-{{ $equipement->id }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <h2>{{ $equipement->marque }} {{ $equipement->modele }}</h2>
                <ul class="list-unstyled">
                    @if($equipement->largeur_plateau_nettoyage)
                        <li><strong>Largeur du plateau de nettoyage:</strong> {{ $equipement->largeur_plateau_nettoyage }}</li>
                    @endif
                    
                    @if($equipement->largeur_tampons)
                        <li><strong>Largeur des tampons:</strong> {{ $equipement->largeur_tampons }}</li>
                    @endif
                    
                    @if($equipement->galonnage)
                        <li><strong>Galonnage:</strong> {{ $equipement->galonnage }}</li>
                    @endif
                    
                    @if($equipement->superficie_nettoyage)
                        <li><strong>Superficie de nettoyage:</strong> {{ $equipement->superficie_nettoyage }}</li>
                    @endif
                    
                    @if($equipement->description)
                        <li><strong>Description:</strong> {{ $equipement->description }}</li>
                    @endif

                    @if($equipement->prix)
                        <li><strong>Prix:</strong> {{ $equipement->prix }} $CAD</li>
                    @endif

                    @if($equipement->documents->isNotEmpty())
                        <p class="mt-3"><strong>Documents:</strong></p>
                        <ul>
                            @foreach($equipement->documents as $document)
                            <li>
                                <a href="{{ asset($document->document_path) }}" target="_blank">Consulter le document</a>
                            </li>
                            @endforeach
                        </ul>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-layout>
