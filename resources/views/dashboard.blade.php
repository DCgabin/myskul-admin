<x-app-layout>

    <x-slot name="pageTitle">{{ __('Accueil') }}</x-slot>
    <x-slot name="subtitle">{{ __("Tableau de Bord des données de l'application MySkul") }}</x-slot>
    <x-panel-statistics />
    <div class="row">
        <x-table-transactions />
        <x-table-products />
    </div>
    <div class="row">
        <x-table-users />
    </div>

</x-app-layout>
