<div {{ $attributes->merge(['class' => "col-md-4 stretch-card grid-margin "]) }}>
    <div class="card">
        <div class="card-body">
            <p class="card-title mb-2">Derniers produits</p>
            <p class="card-description">
                Récents produits enregistrés
            </p>
            @foreach($latestProducts as $product)
                <div class="d-flex">
                    <img src="{{ $product->pictureURL ? : '/assets/images/logo-mini.png' }}" width="50px" height="40px">
                    <div class="ml-2">
                        <p class="text-info mb-1">{{ $product->name }}</p>
                        <p class="mb-0">Prix: {{ $product->price }} FCFA</p>
                    </div>
                </div>
                <hr>
            @endforeach
            @if($latestProducts->isEmpty())
                <hr>
                <tr class="pt-3">
                    <td colspan="5">Désolé 😢. Aucun produits trouvées.</td>
                </tr>
            @endif
        </div>
    </div>
</div>
