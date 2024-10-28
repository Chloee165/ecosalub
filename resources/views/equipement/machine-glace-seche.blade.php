<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Machines à glace sèche" />

    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($machinesGlaceSeche as $machine)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $machine->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($machine->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image->image_path) }}" alt="Image of {{ $machine->marque }} {{ $machine->modele }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-{{ $machine->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-{{ $machine->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- Apply the same class to center marque & modele -->
                    <p class="marque-modele">{{ $machine->marque }} {{ $machine->modele }}</p>
                    <ul>
                        @if($machine->largeur_plateau_nettoyage)
                            <li><strong>Largeur du plateau de nettoyage:</strong> {{ $machine->largeur_plateau_nettoyage }}</li>
                        @endif

                        @if($machine->largeur_tampons)
                            <li><strong>Largeur des tampons:</strong> {{ $machine->largeur_tampons }}</li>
                        @endif

                        @if($machine->galonnage)
                            <li><strong>Galonnage:</strong> {{ $machine->galonnage }}</li>
                        @endif

                        @if($machine->superficie_nettoyage)
                            <li><strong>Superficie de nettoyage:</strong> {{ $machine->superficie_nettoyage }}</li>
                        @endif

                        @if($machine->description)
                            <li><strong>Description:</strong> {{ $machine->description }}</li>
                        @endif

                        @if($machine->prix)
                            <li><strong>Prix:</strong> {{ $machine->prix }} $</li>
                        @endif

                        <!-- Add documents section with updated class -->
                        @if($machine->documents->isNotEmpty())
                            <p class="p-documents"><strong>Documents:</strong></p>
                            <ul>
                                @foreach($machine->documents as $document)
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
