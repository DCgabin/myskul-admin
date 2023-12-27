<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">{{ __('Tableau de bord') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#produits" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Nos Produits</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="produits">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">{{ __('Liste des produits') }}</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.create') }}">{{ __('Nouveau produit') }}</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Utilisateurs</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('payments.index') }}">
                <i class="icon-archive menu-icon"></i>
                <span class="menu-title">Transactions</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('abonnements.index') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Abonnements</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#messages" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-mail menu-icon"></i>
                <span class="menu-title">Messages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="messages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('messages.create') }}">Ajouter</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('messages.index') }}">Consulter</a></li>
                </ul>
            </div>
        </li>
        @can('create-admins')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admins.index') }}">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Administrateurs</span>
                </a>
            </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile', ['user' => Auth::id()]) }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Mon Profil</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->
