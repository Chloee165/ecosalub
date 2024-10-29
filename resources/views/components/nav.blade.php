@props([
    'headerImage' => 'img/fadeBlanc.jpg',
    'headerPhrase' => "La référence pour vos besoins en équipement d'entretien commercial",
])

<!-- Navigation Container -->
<div class="nav-container">
    <!-- Navigation Bar -->
    <nav id="navbar">
        <div class="div-logo">
            <a id="logo-nav" href="{{ route('home') }}">
                <img class="logo" src="{{ asset('img/logo-charcoal.png') }}" alt="">
            </a>
            <input type="hidden"
                alt="Récureuse, Polisseuse, Entretien commercial, équipement de nettoyage, ménage commercial, nettoyage de plancher commercial, scrubber, burnisher, tennant, nobles, pioneer, advance">
        </div>

        <div id="nav">
            <!-- Menu for Desktop -->
            <ul class="nav-top">
                <li class="nav-item">
                    <a href="{{ route('user.login') }}">Portail</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('construction') }}">Documentation</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('construction') }}">Articles</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.login') }}">Admin</a>
                </li>
            </ul>

            <ul class="nav-bottom">
                <li class="nav-item">
                    <a class="nav-a" href="{{ route('entreprise') }}">Entreprise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-a" href="{{ route('construction') }}">Produits et Accessoires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-a" href="{{ route('equipement') }}">Équipements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-a" href="{{ route('construction') }}">Services</a>
                </li>
                <li class="btn-blc">
                    <a class="btn-soumission" href="{{ route('contact') }}">SOUMISSION</a>
                </li>
                <li class="btn-bleu">
                    <a class="btn-contact" href="{{ route('contact') }}">CONTACT</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<nav id="nav-mobile">
    <!-- Hamburger Menu for Mobile -->
    <div class="hamburger" id="hamburgerMenu">
        <img src="{{ asset('img/list.png') }}" id="hamburgerImage">
    </div>

    <!-- Fullscreen Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <span class="close-btn" id="closeMenuBtn">X</span>
        <ul class="mobile-nav">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('entreprise') }}">Entreprise</a></li>
            <li><a href="{{ route('equipement') }}">Équipement</a></li>
            <li><a href="{{ route('construction') }}">Services</a></li>
            <li><a class="blue" href="{{ route('user.login') }}">Portail</a></li>
            <li><a class="blue" href="{{ route('construction') }}">Documentation</a></li>
            <li><a class="blue" href="{{ route('construction') }}">Articles</a></li>
            <li><a class="blue" href="{{ route('admin.login') }}">Admin</a></li>
            <li><a class="blue" href="{{ route('contact') }}">Soumission</a></li>
            <li><a class="blue" href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </div>
</nav>

<header class="header-section">
    <h1 class="header-phrase">{{ $headerPhrase }}</h1>
    <img class="img-header-home" src="{{ asset($headerImage) }}" alt="Header Image">
    <section id="mobile-btns-section">
        <a class="btn-soumission-mobile btn-blc" href="{{ route('contact') }}">SOUMISSION</a>
        <a class="btn-contact-mobile btn-bleu" href="{{ route('contact') }}">CONTACT</a>
    </section>
</header>

