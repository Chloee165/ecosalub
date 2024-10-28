<div class="admin-panel-nav">
    <nav class="sidebar">
        <ul class="menu">
            <li class="dropdown">
                <a href="#">Administrateurs</a><!-- Lien vers form d'ajout-->
            </li>
            <li class="dropdown">
                <a href="#">Clients</a><!-- Lien vers form d'ajout / Modification / Barre de recherche?? -->
            </li>
            <li class="dropdown">
                <a href="#">Articles</a><!-- Lien vers form d'ajout / Modification / Barre de recherche?? -->
            </li>
            <li class="dropdown">
                <a href="#">Équipements</a>
                <ul class="dropdown-content">
                    <li><a href="{{ route('equipement.show', ['type' => 'recureuse']) }}">Récureuses</a></li>
                    <li><a href="{{ route('equipement.show', ['type' => 'polisseuse-propane']) }}">Polisseuses propane</a></li>
                    <li><a href="{{ route('equipement.show', ['type' => 'polisseuse-batteries']) }}">Polisseuses batteries</a></li>
                    <li><a href="{{ route('equipement.show', ['type' => 'decapeuse']) }}">Décapeuses</a></li>
                    <li><a href="{{ route('equipement.show', ['type' => 'aspirateur']) }}">Aspirateurs</a></li>
                    <li><a href="{{ route('equipement.show', ['type' => 'extracteur-tapis']) }}">Extracteurs à tapis</a></li>
                    <li><a href="{{ route('equipement.show', ['type' => 'balai-mecanique']) }}">Balais mécaniques</a></li>
                    <li><a href="{{ route('equipement.show', ['type' => 'machine-glace-seche']) }}">Machines à glace sèche</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>