<x-layout>
    <x-nav headerImage="img/equipement-header-img.png" headerPhrase="Produits et Accessoires" />
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section id="liens-equipements">
        <ul id="types-equipements">
            @foreach ($produits as $produit)
                @if ($produit->categorie_produit->titre == 'Chargeurs') {{-- Temporaire --}}
                    <li>
                        <a href="{{ route('produit.show', ['id' => $produit->id]) }}">
                            <img src="{{ asset('img/' . $produit->titre) }}" alt="Image de {{ $produit->titre }}">
                            <p class="titre-equipement">{{ $produit->titre }}</p>
                            <p class="titre-equipement">{{ $produit->categorie_produit->titre }}</p> {{-- To erase --}}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </section>

</x-layout>
