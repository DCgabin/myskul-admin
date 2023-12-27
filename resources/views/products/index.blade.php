<x-app-layout>
    <x-slot name="pageTitle">Gestion produits</x-slot>
    <x-slot name="subtitle">{{ __('Gestion des produits') }}</x-slot>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Liste des produits enregistrés</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Description</th>
                                <th>Édition</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="table-item">
                                    <td>
                                        <div class="d-flex">
                                            <img src="{{ $product->pictureURL ? : '/assets/images/logo-mini.png' }}" width="50px" height="40px">
                                            <div class="ml-2">
                                                <p class="text-info mb-1">{{ $product->name }}</p>
                                                <small>Enregistré le {{ $product->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><p class="mb-0"><span class="font-weight-bold mr-2">{{ $product->price }}</span> FCFA</p></td>
                                    <td>{{ $product->description }}</td>
                                    <td class="font-weight-medium">
                                        <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                {{ __('Supprimé') }}
                                            </button>
                                        </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
