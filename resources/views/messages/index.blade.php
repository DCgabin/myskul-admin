<x-app-layout>
    <x-slot name="pageTitle">{{ __('Messages forum') }}</x-slot>
    <x-slot name="subtitle">{{ __('Gestion des messages') }}</x-slot>

    <div class="row">
        <x-table-messages />
    </div>

</x-app-layout>
