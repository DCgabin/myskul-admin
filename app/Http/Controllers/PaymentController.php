<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $numberOfTransactions = Payment::count();
        $numberOfTransactionsOM = Payment::where('service_sigle', 'LIKE', 'OM')->count();
        $numberOfTransactionsMOMO = Payment::where('service_sigle', 'LIKE', 'MOMO')->count();
        $numberOfTransactionsSUCCESS = Payment::where('status', '=', 0)->count();

        return view('payments.index', compact('numberOfTransactions',
            'numberOfTransactionsMOMO',
            'numberOfTransactionsSUCCESS',
            'numberOfTransactionsOM'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
