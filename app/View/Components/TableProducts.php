<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class TableProducts extends Component
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
        $products = Product::latest()
            ->paginate(5, ['*'], "productsPage")
            ->withQueryString();

        return view('components.table-products', ['products' => $products]);
    }
}
