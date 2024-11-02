<x-layout>
    <div>
        <h2>{{$produit->titre}}</h2>
        <p>{{$produit->description}}</p>
        <p>{{$produit->prix}}</p>
        <p>{{$produit->categorie_produit->titre}}</p>
    </div>
</x-layout>
