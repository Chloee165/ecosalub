
<x-layout>
    <x-nav headerImage="img/equipement-header-img.png" headerPhrase="Équipements"/>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
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
            <li>
                <a href="{{ route('equipement.recureuse') }}">
                    <img src="{{ asset('img/Récureuse-Scrubber.png') }}" alt="">
                    <p>Récureuses</p>
                </a>
            </li>
            <li>
                <a href="{{ route('equipement.polisseuse-propane') }}">
                    <img src="{{ asset('img/Polisseuse-Burnisher_Propane.png') }}" alt="">
                    <p>Polisseuses propane</p>
                </a>
            </li>
            <li>
                <a href="{{ route('equipement.polisseuse-batteries') }}">
                    <img src="{{ asset('img/Polisseuse-Burnicher_batterie.png') }}" alt="">
                    <p>Polisseuses Batteries</p>
                </a>
            </li>
            <li>
                <a href="{{ route('equipement.decapeuse') }}">
                    <img src="{{ asset('img/img-a-venir.png') }}" alt="">
                    <p>Décapeuses</p>
                </a>
            </li>
            <li>
                <a href="{{ route('equipement.aspirateur') }}">
                    <img src="{{ asset('img/img-a-venir.png') }}" alt="">
                    <p>Aspirateurs</p>
                </a>
            </li>
            <li>
                <a href="{{ route('equipement.extracteur-tapis') }}">
                    <img src="{{ asset('img/img-a-venir.png') }}" alt="">
                    <p>Extracteurs à tapis</p>
                </a>
            </li>
            <li>
                <a href="{{ route('equipement.balai-mecanique') }}">
                    <img src="{{ asset('img/img-a-venir.png') }}" alt="">
                    <p>Balais mécaniques</p>
                </a>
            </li>
            <li>
                <a href="{{ route('equipement.machine-glace-seche') }}">
                    <img src="{{ asset('img/img-a-venir.png') }}" alt="">
                    <p>Machines à glace sèche</p>
                </a>
            </li>
        </ul>
    </section>

</x-layout>

