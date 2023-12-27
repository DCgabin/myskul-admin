<?php

namespace App\View\Components;

use App\Models\Payment;
use Illuminate\View\Component;

class TableTransactions extends Component
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
        $transactions = Payment::orderBy('createdAt', 'desc')
            ->paginate(10, ['*'], "paymentsPage")
            ->withQueryString();

        return view('components.table-transactions', [
            'transactions' => $transactions
        ]);
    }
}
