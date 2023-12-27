<div class="row">
    <div class="col-12 grid-margin transparent">
        <div class="row">
            <div class="col-md-3 stretch-card transparent">
                <div class="card card-light-green">
                    <div class="card-body">
                        <p class="mb-4">Nombre d'Utilisateurs</p>
                        <p class="fs-30">{{ $numberOfUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card transparent">
                <div class="card card-light">
                    <div class="card-body">
                        <p class="mb-4">Nombre de Produits</p>
                        <p class="fs-30">{{ $numberOfProducts }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-lg-0 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Nombre de Transactions</p>
                        <p class="fs-30">{{ $numberOfTransactions }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card transparent">
                <div class="card card-light-danger">
                    <div class="card-body">
                        <p class="mb-4">Nombre d'Admins</p>
                        <p class="fs-30">{{ $numberOfAdmins }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
