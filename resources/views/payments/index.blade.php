<x-app-layout>
    <x-slot name="pageTitle">{{ __('Gérer vos transactions') }}</x-slot>
    <x-slot name="subtitle">{{ __('Gestion des transactions') }}</x-slot>

    <div class="row">

        <x-table-transactions />

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-2">Statistiques</p>
                    <p class="card-description">
                        Nombre de transactions
                    </p>
                    <div class="d-flex">
                        <img src="{{ asset('assets/images/payments/OM.jpg') }}" width="50px" height="40px">
                        <div class="ml-2">
                            <p class="text-info mb-1">Paiements OM</p>
                            <p class="mb-0">Nombre: {{ $numberOfTransactionsOM }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <img src="{{ asset('assets/images/payments/MOMO.jpg') }}" width="50px" height="40px">
                        <div class="ml-2">
                            <p class="text-info mb-1">Paiements MOMO</p>
                            <p class="mb-0">Nombre: {{ $numberOfTransactionsMOMO }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <img src="{{ asset('assets/images/logo-mini.png') }}" width="50px" height="40px">
                        <div class="ml-2">
                            <p class="text-info mb-1">Tous les paiements</p>
                            <p class="mb-0">Nombre: {{ $numberOfTransactions }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <img src="{{ asset('assets/images/logo-mini.png') }}" width="50px" height="40px">
                        <div class="ml-2">
                            <p class="text-info mb-1">Nombres d'abonnement réussit</p>
                            <p class="mb-0">Nombre: {{ $numberOfTransactionsSUCCESS }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
