<x-app-layout>
    <x-slot name="pageTitle">{{ __('Gérer vos abonnements') }}</x-slot>
    <x-slot name="subtitle">{{ __('Gestion des abonnements') }}</x-slot>

    <div class="row">
        <x-table-abonnements />
    </div>

</x-app-layout>
