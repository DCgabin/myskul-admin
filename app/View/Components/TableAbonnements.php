<?php

namespace App\View\Components;

use App\Models\UserAbonnement;
use Illuminate\View\Component;

class TableAbonnements extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $users_abonnements = UserAbonnement::orderBy('createdAt', 'desc')
            ->paginate()
            ->withQueryString();

        return view('components.table-abonnements', compact('users_abonnements'));
    }
}
