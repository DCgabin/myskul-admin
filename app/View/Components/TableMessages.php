<?php

namespace App\View\Components;

use App\Models\Message;
use Illuminate\View\Component;

class TableMessages extends Component
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
        $messages = Message::latest('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('components.table-messages', compact('messages'));
    }
}
