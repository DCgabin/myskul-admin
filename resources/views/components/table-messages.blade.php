<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title mb-0">Liste des messages envoyés</p>
            <div class="table-responsive">
                <table class="table table-striped table-borderless">
                    <thead>
                    <tr>
                        <th>Destinataire</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                    <tr class="table-item">
                        <td>
                            <div class="d-flex">
                                <div class="">
                                    <p class="text-info mb-1">Niveau {{ $message->level->name }} - {{ $message->speciality->name }}</p>
                                    <small>Envoyé {{ $message->sendAt->diffForHumans() }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="message-content">
                            {{ $message->message }}
                        </td>

                        <td class="font-weight-medium">
                            <form method="POST" action="{{ route('messages.destroy', ['message' => $message->id]) }}">
                                @method('DELETE')
                                @csrf
                                <a class="btn btn-link text-danger" data-toggle="modal" data-target="#deleteModal">
                                    <i class="icon-trash text-danger"></i>
                                    Supprimer
                                </a>
                                {{--    Modal--}}
                                <x-modal :message="__('Vous êtes sur le point de supprimer le message, veuillez confirmer.')"/>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <hr />
            {{ $messages->links() }}
        </div>
    </div>
</div>
