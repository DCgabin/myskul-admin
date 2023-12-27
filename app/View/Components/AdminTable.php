<?php

namespace App\View\Components;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\Component;

class AdminTable extends Component
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
        $admins = User::whereHas('roles')
            ->paginate(5, ['*'], "adminsPage")
            ->withQueryString();
        return view('components.admin-table', compact('admins'));
    }
}
