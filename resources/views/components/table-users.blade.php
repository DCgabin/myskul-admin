<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title mb-0">Dernier utilisateurs enregistrés</p>
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
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <div>
                                        <p class="text-info mb-1">{{ $user->name }}</p>
                                        <p class="mb-0">{{ $user->level ? "Niveau ". $user->level->name : '' }} {{ $user->speciality ? $user->speciality->name : '' }}</p>
                                        <small>Enregistré le {{ $user->created_at ? $user->created_at->format('d M Y ') : __('(Aucune date disponile)') }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="font-weight-bold"> {{ $user->email }} </td>
                            <td>{{ $user->phoneNumber }}</td>
                            <td>{{ $user->town ? : __('Inconnue')}}</td>

                            @if ($user->token)
                                <td class="font-weight-medium">
                                    <div class="badge badge-success">En ligne</div>
                                </td>
                            @else
                                <td class="font-weight-medium">
                                    <div class="badge badge-danger">Hors-ligne</div>
                                </td>
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
                <div class="py-3 w-full">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
