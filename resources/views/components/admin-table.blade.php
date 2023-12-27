<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title mb-0">Liste des administrateurs</p>
            <div class="table-responsive">
                <table class="table table-striped table-borderless">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr class="table-item">
                            <td>{{ $admin->name }}</td>
                            <td class="font-weight-bold">{{ $admin->email }}</td>
                            <td>{{ $admin->created_at ? $admin->created_at->diffForHumans() : __('Inconnue') }}</td>
                            @if(empty($admin->remember_token))
                                <td class="font-weight-medium"><div class="badge badge-danger">Déconnecté</div></td>
                            @else
                                <td class="font-weight-medium"><div class="badge badge-success">En ligne</div></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="py-3 w-full">
                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
