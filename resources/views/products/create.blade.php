<x-app-layout>
    <x-slot name="pageTitle">{{ __('Créer un produit') }}</x-slot>
    <x-slot name="subtitle">{{ __('Gestion des produits') }}</x-slot>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-2">Enregistrer un nouveau produit</p>
                    <form class="forms-sample" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <x-form-input :error="$errors->first('name')"
                                      :value="old('name')"
                                      name="name"
                                      :label="__('Nom du produit')"
                                      :required="true" placeholder="Nom complet du produit" />
                        <x-form-input :error="$errors->first('price')"
                                      type="number"
                                      :value="old('price')"
                                      name="price"
                                      aria-label="Amount"
                                      :label="__('Prix unitaire')" :required="true" badge="FCFA"  />
                        <x-form-input :error="$errors->first('pictureURL')"
                                      type="file"
                                      name="pictureURL"
                                      accept="image/jpeg, image/png"
                                      aria-label="Product Picture"
                                      :label="__('Image du produit')" :required="true" badge="Importer"  />
                        <div class="form-group">
                            <label for="description">Description<span style="color:red;cursor:pointer" title="{{ __('Ce champ est obligatoire') }}">*</span></label>
                            <textarea class="form-control" value="{{ old('description') }}" id="description" name="description" rows="4" required=""></textarea>
                            @if (isset($errors) and $errors->first('description'))
                                <span class="text-sm" style="color:red;">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <x-button class="btn btn-primary mr-2">Enregistrer</x-button>
                        <x-button type="reset" class="btn btn-light">Effacer</x-button>
                    </form>
                </div>
            </div>
        </div>
        <x-latest-products />
    </div>
    <!-- content-wrapper ends -->
</x-app-layout>
