<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title mb-0">
                {{ __('Abonnements utilisateurs') }}
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th>Nom utilisateur</th>
                            <th>Email</th>
                            <th>Identifiant de transaction</th>
                            <th>Numéro du payeur</th>
                            <th>Niveau</th>
                            <th>Spécialité</th>
                            <th>Date de paiement</th>
                            <th>Montant</th>
                            <th>Date d'expiration</th>
                            @can('delete-abonnement')
                            <th></th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users_abonnements as $user_transaction)
                        <tr>
                            <td>{{ $user_transaction->user->name }}</td>
                            <td>{{ $user_transaction->user->email }}</td>
                            <td>{{ $user_transaction->transactionID }}</td>
                            <td>{{ $user_transaction->buyerPhoneNumber }}</td>
                            <td>{{ $user_transaction->level->name }}</td>
                            <td>{{ $user_transaction->speciality->name }}</td>
                            <td>
                                <div class="badge badge-success">
                                    {{ $user_transaction->createdAt->format("d M Y") }}
                                </div>
                            </td>
                            <td class="font-weight-bold">{{ $user_transaction->payment->montant }} FCFA</td>
                            <td class="font-weight-medium">
                                @if($user_transaction->expireAt->gt(\Carbon\Carbon::now()))
                                    <div class="badge badge-warning">{{ $user_transaction->expireAt->format("d M Y") }}</div>
                                @else
                                    <div class="badge badge-danger">{{ $user_transaction->expireAt->diffForHumans() }}</div>
                                @endif
                            </td>
                            @if($user_transaction->expireAt->lt(\Carbon\Carbon::now()))
                                @can('delete-abonnement')
                                    <td class="font-weight-medium">
                                        <form method="POST" action="{{ route('abonnements.destroy', ['abonnement' => $user_transaction->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                {{ __('Supprimé') }}
                                            </button>
                                        </form>
                                    </td>
                                @endcan
                            @endif
                        </tr>
                    @endforeach
                    @if ($users_abonnements->isEmpty())
                    <tr>
                        <td colspan="5">Désolé 😢. Aucun abonnements trouvés.</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
                <div class="py-3 w-full">
                    {{ $users_abonnements->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
