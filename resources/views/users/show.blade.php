<x-app-layout>
    <x-slot name="pageTitle">{{ __('Profile') }}</x-slot>
    <x-slot name="subtitle">{{ __('Profile : ' . $user->name) }}</x-slot>

    <div class="row">
        <div class=" {{ Auth::id() === $user->id ? 'col-md-8' : 'col-md-12' }} grid-margin stretch-card">
            <div class="row">
                <div class="col-xs-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Gestion du profil</p><hr>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-profil-tab" data-toggle="tab" href="#nav-profil" role="tab" aria-controls="nav-profil" aria-selected="true">Mon Profil</a>
                                    <a class="nav-item nav-link" id="nav-modifier-tab" data-toggle="tab" href="#nav-modifier" role="tab" aria-controls="nav-modifier" aria-selected="false">Modifier</a>
                                    <a class="nav-item nav-link" id="nav-supprimer-tab" data-toggle="tab" href="#nav-supprimer" role="tab" aria-controls="nav-supprimer" aria-selected="false">Supprimer</a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent" style="width: 100%">
                                <div class="tab-pane fade show active" id="nav-profil" role="tabpanel" aria-labelledby="nav-profil-tab">
                                    Bienvenue dans la gestion du compte. Accéder facilement à vos informations et modifier vos données simplement.<hr />
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td class="pl-0">Nom complet</td>
                                                <td><span class="font-weight-bold mr-2">{{ $user->name }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">Adresse email</td>
                                                <td><span class="font-weight-bold mr-2">{{ $user->email }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">Ville</td>
                                                <td><span class="font-weight-bold mr-2">{{ $user->town }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">Numéro de téléphone</td>
                                                <td><span class="font-weight-bold mr-2">{{ $user->phoneNumber }}</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-modifier" role="tabpanel" aria-labelledby="nav-modifier-tab">
                                    Dans cette section, vous pouvez modifier les informations liées à votre compte sans difficultés.
                                    <hr />
                                    <form class="forms-sample" method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                                        @method('PUT')
                                        @csrf
                                        <x-form-input :error="$errors->first('name')"
                                                      :value="$user->name"
                                                      name="name"
                                                      :label="__('Nom')"
                                                      :required="true" placeholder="Nom complet" />
                                        <x-form-input :error="$errors->first('email')"
                                                      :value="$user->email"
                                                      type="email"
                                                      name="email"
                                                      :label="__('Adresse Email')"
                                                      :required="true" placeholder="Adresse Email" />
                                        <x-form-input :error="$errors->first('town')"
                                                      :value="$user->town"
                                                      name="town"
                                                      :label="__('Ville')"
                                                      :required="true"
                                                      placeholder="Ville" />
                                        <x-form-input :error="$errors->first('phoneNumber')"
                                                      :value="$user->phoneNumber"
                                                      name="phoneNumber"
                                                      :label="__('Numéro de téléphone')"/>
                                        <x-form-input :error="$errors->first('old_password')"
                                                      type="password"
                                                      name="old_password"
                                                      :label="__('Ancien mot de passe')"
                                                      placeholder="Ancien mot de passe" />
                                        <x-form-input :error="$errors->first('password')"
                                                      type="password"
                                                      name="password"
                                                      :label="__('Nouveau mot de passe')"
                                                      placeholder="Nouveau mot de passe" />
                                        <x-form-input :error="$errors->first('password_confirmation')"
                                                      type="password"
                                                      name="password_confirmation"
                                                      :label="__('Confirmer le mot de passe')"
                                                      placeholder="Confirmer le mot de passe" />
                                        <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                                        <button type="reset" class="btn btn-light">Réintialiser</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-supprimer" role="tabpanel" aria-labelledby="nav-supprimer-tab">
                                    Si vous supprimez votre compte, vous n'aurez plus accès à la plateforme ainsi qu'aux données qui y sont associées.
                                    <br>
                                    <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a class="btn btn-link text-danger" data-toggle="modal" data-target="#deleteModal">
                                            Oui je veux supprimer
                                            <i class="icon-trash text-danger"></i>
                                            le compte.
                                        </a>

                                        {{--    Modal--}}
                                        <x-modal :message="__('Vous êtes sur le point de supprimer votre compte ? Veuillez confirmer.')"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::id() === $user->id)
            <div class="col-md-4 stretch-card grid-margin">
                <div class="row">
                    <x-latest-messages />
                    <x-latest-products class="col-md-12" />
                </div>
            </div>
        @endif
    </div>

</x-app-layout>
