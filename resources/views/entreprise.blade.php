<x-layout>
    <x-nav headerImage="img/img_entreprise.webp" headerPhrase="Qui sommes-nous?" />
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
    <section id="page-entreprise">
        <section id="entreprise-intro">
            <p>Ecosalub est une entreprise en constante évolution, spécialisée dans l’achat, la vente, le service, la
                réparation et la remise à neuf d’équipements de nettoyage commercial. Ecosalub dessert l’ensemble du
                Canada !
            </p>
        </section>

        <section id="entreprise-succursales">
            <img class="img-page-entreprise" src="{{ asset('img/entreprise-sec1.png') }}" alt="">
            <div class="container-charcoal">
                <h2>Succursales</h2>
                <p>
                    Notre bureau chef est situé à Laval. Toutes les activités de reconditionnement complet des
                    équipements y
                    sont effectuées. Une grande salle de montre s’y trouve et tous les équipements remis à neuf ainsi
                    que la
                    majorité des modèles y sont exposés. Sur demande, vous pouvez en faire l’essai, sur place, à même
                    nos
                    locaux !
                </p>
                <br>
                <p>Ecosalub compte une deuxième succursale se trouvant à Mississauga en Ontario, abritant elle aussi une
                    salle de montre ainsi qu’un atelier de service et réparation.</p>
            </div>
        </section>

        <section id="entreprise-service">
            <h2>Service</h2>
            <p>Nous sommes spécialisés dans la remise à neuf d’équipements d’entretien commercial tels que polisseuses,
                récureuses à traction, récureuses rotatives (swing), machines à tapis, etc.</p>
            <p>Nous avons une couverture nationale pour supporter certains de nos clients majeurs dans l’entretien
                commercial. Notre équipe de techniciens mobiles est là pour répondre aux besoins mécaniques sur les
                récureuses
                et les polisseuses à batteries et propane à travers le Canada.
            </p>
            <p class="pbtm">Nous offrons aussi le service de maintenance préventive et d’inspection périodique.</p>
        </section>

        <section id="entreprise-equipement">
            <div class="container-charcoal">
                <h2>Équipements et pièces</h2>
                <p>Nos techniciens sont spécialisés dans plusieurs marques telles que TENNANT, NOBLES, ADVANCE, PIONEER
                    et bien d’autres.</p>
                <p class="pbtm">Nous avons plus de 200 équipements disponibles à la revente et plusieurs équipements
                    de remplacement
                    utilisés lors d’interventions de réparation pour répondre aux besoins de nos clients.</p>
            </div>
            <img src="{{ asset('img/entreprise-sec2.png') }}" alt="">
        </section>

        <section id="entreprise-conclusion">
            <div>
                <img class="img1" src="{{ asset('img/camions.jpg') }}" alt="camions">
            </div>
            <div id="content">
                <p>Pour vos besoins de maintenance ou de réparation, un grand inventaire de pièces est disponible
                    pour
                    une expédition le lendemain ou le jour même.</p>
                <p>Ecosalub est dépositaire des chargeurs ECOCHARGE MAX et de batteries AGM et acide ECOPOWER MAX.</p>
                <div id="tag-logos-ecos">
                    <img src="{{ asset('img/ecocharge.png') }}" alt="logo ecocharge">
                    <img src="{{ asset('img/ecopower.png') }}" alt="logo ecopower">
                </div>
            </div>
            <div>
                <img class="img2" src="{{ asset('img/camions.jpg') }}" alt="camions">
            </div>
        </section>
    </section>
</x-layout>
