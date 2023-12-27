<x-app-layout>
    <x-slot name="pageTitle">{{ __('Envoyé Messages') }}</x-slot>
    <x-slot name="subtitle">{{ __('Envoyé des messages dans les différents Forum') }}</x-slot>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-2">Envoyer un nouveau message</p>

                    <x-errors :errors="$errors" />

                    <form class="forms-sample" method="POST" action="{{ route('messages.store') }}">
                        @csrf
                        <x-form-select name="level"
                                      :label="__('Niveau')"
                                       :options="$levels"
                                      :required="true" />

                        <x-form-select name="speciality"
                                      :label="__('Spécialilé')"
                                       :options="$specialities"
                                      :required="true" />

                        <x-text-area name="message"
                                      :label="__('Message')"
                                      :required="true" />

                        <button type="submit" class="btn btn-primary mr-2">Envoyer</button>
                        <button type="reset" class="btn btn-light">Effacer</button>
                    </form>
                </div>
            </div>
        </div>

        <x-latest-messages />

    </div>

</x-app-layout>
