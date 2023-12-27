<?php

namespace App\View\Components;

use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\Component;

class PanelStatistics extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $numberOfUsers = User::all()->count();
        $numberOfAdmins = User::whereHas('roles')->get()->count();
        $numberOfTransactions = Payment::all()->count();
        $numberOfProducts = Product::all()->count();

        return view('components.panel-statistics', [
            'numberOfUsers' => $numberOfUsers,
            'numberOfAdmins' => $numberOfAdmins,
            'numberOfProducts' => $numberOfProducts,
            'numberOfTransactions' => $numberOfTransactions
        ]);
    }
}
