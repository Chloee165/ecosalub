<x-layout>
    <x-nav headerImage="img/whitefade-tealBg.png" headerPhrase="Machines à glace sèche"/>

    <section class="liens-equipements">
        <ul class="types-equipements">
            @foreach($machinesGlaceSeche as $machine)
            <li>
                <div class="carousel">
                    <div id="carousel-{{ $machine->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($machine->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image of {{ $machine->marque }} {{ $machine->modele }}">
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
                    <p>{{ $machine->marque }} {{ $machine->modele }}</p>
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

                        <!-- Add documents section -->
                        @if($machine->documents->isNotEmpty())
                            <p><strong>Documents:</strong></p>
                            <ul>
                                @foreach($machine->documents as $document)
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
