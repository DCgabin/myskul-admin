<x-app-layout>
    <x-slot name="pageTitle">Admins</x-slot>
    <x-slot name="subtitle">Gestion des Administrateurs</x-slot>

    <?php
    // indicateur de champ obligatoire
    $obligatoire = '<span style="color:red;cursor:pointer" title="Ce champ est obligatoire">*</span>';
    ?>

    <div class="row">
        <x-admin-table />
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-2">Enregistrer un admin</p>
                    <p class="card-description">
                        Création d'un nouvel admin pouvant gérer MySkul
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('admins.store') }}">
                        @csrf
                        <x-form-input :error="$errors->first('name')"
                                      :value="old('name')"
                                      name="name"
                                      :label="__('Nom admin')"
                                      :required="true" placeholder="Nom complet de l'admin" />
                        <x-form-input :error="$errors->first('town')"
                                      :value="old('town')"
                                      name="town"
                                      :label="__('Ville admin')"
                                      placeholder="Ville de l'admin" />
                        <x-form-input :error="$errors->first('phoneNumber')"
                                      :value="old('phoneNumber')"
                                      name="phoneNumber"
                                      :label="__('Numéro de téléphone')"/>
                        <x-form-input :error="$errors->first('email')"
                                      :value="old('email')"
                                      type="email"
                                      name="email"
                                      :label="__('Adresse Email')"
                                      :required="true" placeholder="Adresse Email" />
                        <x-form-input :error="$errors->first('password')"
                                      type="password"
                                      name="password"
                                      :label="__('Mot de passe')"
                                      :required="true" placeholder="Mot de passe" />
                        <x-form-input :error="$errors->first('password_confirmation')"
                                      type="password"
                                      name="password_confirmation"
                                      :label="__('Confirmer le mot de passe')"
                                      :required="true" placeholder="Confirmer le mot de passe" />

                        <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                        <button type="reset" class="btn btn-light">Effacer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
