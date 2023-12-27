<div class="col-md-4 stretch-card grid-margin">
    <div class="card">
        <div class="card-body">
            <p class="card-title mb-0">Produits</p>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th class="pl-0  pb-2 border-bottom">Nom</th>
                            <th class="border-bottom pb-2">Prix</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)
                        <tr>
                            <td class="pl-0">{{ $product->name }}</td>
                            <td>
                                <p class="mb-0"><span class="font-weight-bold mr-2">{{ $product->price }}</span>FCFA</p>
                            </td>
                        </tr>
                    @endforeach

                    @if($products->isEmpty())
                        <tr>
                            <td colspan="5">Désolé 😢. Aucun produits trouvées.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="py-3 w-full">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
