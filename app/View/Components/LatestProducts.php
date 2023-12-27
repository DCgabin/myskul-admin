<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class LatestProducts extends Component
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
        $latestProducts = Product::latest()
            ->paginate(5)->withQueryString();

        return view('components.latest-products', compact('latestProducts'));
    }
}
