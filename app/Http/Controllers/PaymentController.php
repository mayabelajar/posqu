<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display the payment method page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('payment.index');
    }

    /**
     * Process the payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'payment_method' => 'required|in:cash,card,bank_transfer',
            'table_type' => 'required|in:indoor,outdoor',
            'total_payment' => 'required|numeric',
        ]);

        // Process the payment based on the selected method
        if ($request->payment_method === 'cash') {
            // Process cash payment
        } elseif ($request->payment_method === 'card') {
            // Process card payment
        } elseif ($request->payment_method === 'bank_transfer') {
            // Process bank transfer payment
        }

        // Store the order information
        // ...

        // Redirect to the success page
        return redirect()->route('payment.success');
    }

    /**
     * Display the payment success page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function success()
    {
        return view('payment.success');
    }
}