<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title mb-0">
            @if(request()->is('dashboard'))
                {{ __('Dernières transactions') }}
            @else
                {{ __('Liste des transactions') }}
            @endif
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Montant</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->phoneNumber }}</td>
                            <td class="font-weight-bold">{{ $transaction->montant }} FCFA</td>
                            <td><img src="../assets/images/payments/{{ $transaction->service_sigle }}.jpg" /></td>
                            <td>{{ $transaction->createdAt->diffForHumans() }}</td>
                            <td class="font-weight-medium">
                                @if($transaction->status == 0)
                                    <div class="badge badge-success">{{ __('Réussi') }}</div>
                                @elseif($transaction->status == 1 || $transaction->status == 2)
                                    <div class="badge badge-warning">{{ __('En cours') }}</div>
                                @else
                                    <div class="badge badge-danger">{{ __('Échoué') }}</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    @if ($transactions->isEmpty())
                        <tr>
                            <td colspan="5">Désolé 😢. Aucune transactions trouvées.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="py-3 w-full">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
