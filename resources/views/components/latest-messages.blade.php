<div class="col-md-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title mb-2">Derniers messages</p>
            <p class="card-description">
                Récents messages enregistrés
            </p>
            @foreach($messages as $message)
                <div class="d-flex">
                    <div>
                        <p class="text-info mb-1">Niveau {{ $message->level->name }} - {{ $message->speciality->name }}</p>
                        <p class="mb-0">{{ $message->message }}</p>
                        <small>Envoyé {{ $message->sendAt->diffForHumans() }}</small>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
