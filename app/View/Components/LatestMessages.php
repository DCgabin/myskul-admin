<?php

namespace App\View\Components;

use App\Models\Message;
use Illuminate\View\Component;

class LatestMessages extends Component
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
            ->limit(5)->get();

        return view('components.latest-messages', compact('messages'));
    }
}
