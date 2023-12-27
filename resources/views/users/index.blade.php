<x-app-layout>
    <x-slot name="pageTitle">{{ __('Gérer vos utilisateurs') }}</x-slot>
    <x-slot name="subtitle">{{ __('Gestion des utilisateurs') }}</x-slot>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Liste des utilisateurs</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Ville</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="table-item">
                                    <td>
                                        <div class="d-flex">
                                            <div>
                                                <p class="text-info mb-1">{{ $user->name }}</p>
                                                <p class="mb-0">{{ $user->level ? "Niveau ". $user->level->name : '' }} {{ $user->speciality ? $user->speciality->name : '' }}</p>
                                                <small>Enregistré {{ $user->created_at ? $user->created_at->diffForHumans() : 'Aucune information' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="font-weight-bold">{{ $user->email }}</td>
                                    <td>{{ $user->phoneNumber }}</td>
                                    <td>{{ $user->town ? : __('Inconnue') }}</td>
                                    @if($user->token !=  '')
                                        <td class="font-weight-medium"><div class="badge badge-success">En ligne</div></td>
                                    @else
                                        <td class="font-weight-medium"><div class="badge badge-danger">Hors-ligne</div></td>
                                    @endif
                                    <td class="font-weight-medium">
                                        <a href="{{ route('users.show', ['user' => $user->id]) }}">
                                            <i class="icon-head"></i>
                                            <span>Éditer</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-3 w-full">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-2">Statistiques</p>
                    <p class="card-description">
                        Nombre d'utilisateurs
                    </p>
                    <div class="d-flex">
                        <div class="badge px-3 badge-success">{{ $numberOfOnlineUsers }}</div>
                        <div class="ml-2">
                            <p class="text-info">Utilisateurs connectés</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <div class="badge px-3 badge-danger">{{ $numberOfUsers - $numberOfOnlineUsers }}</div>
                        <div class="ml-2">
                            <p class="text-info">Utilisateurs déconnectés</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <div class="badge px-3 badge-info">{{ $numberOfUsers }}</div>
                        <div class="ml-2">
                            <p class="text-info">Tous les utilisateurs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
